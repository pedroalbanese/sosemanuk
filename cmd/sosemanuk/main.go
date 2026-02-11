package main

import (
	"bytes"
	"crypto/rand"
	"encoding/hex"
	"flag"
	"fmt"
	"io"
	"log"
	"os"

	"github.com/pedroalbanese/sosemanuk"
)

var (
	dec     = flag.Bool("d", false, "Decrypt instead of Encrypt.")
	file    = flag.String("f", "", "Target file. ('-' for STDIN)")
	key     = flag.String("k", "", "Symmetric key (hex) to Encrypt/Decrypt. (32 bytes max)")
	nonce   = flag.String("n", "", "Nonce/IV (hex) to Encrypt/Decrypt. (16 bytes max)")
	random  = flag.Bool("r", false, "Generate random key (32 bytes) and nonce (16 bytes).")
	verbose = flag.Bool("v", false, "Verbose mode.")
)

func main() {
	flag.Parse()

	if len(os.Args) < 2 {
		printUsage()
		os.Exit(1)
	}

	if *random {
		generateKeyAndNonce()
		os.Exit(0)
	}

	// Process key
	var keyBytes []byte
	var err error

	if *key == "" {
		log.Fatal("Key is required. Use -k <hex> or -r to generate.")
	}

	keyBytes, err = hex.DecodeString(*key)
	if err != nil {
		log.Fatal("Error decoding hex key:", err)
	}
	if len(keyBytes) > 32 {
		log.Fatal("Invalid key size for Sosemanuk. Max 32 bytes (256 bits).")
	}
	if *verbose {
		fmt.Fprintf(os.Stderr, "Key: %d bytes\n", len(keyBytes))
	}

	// Process nonce
	var nonceBytes []byte

	if *nonce == "" {
		log.Fatal("Nonce is required. Use -n <hex> or -r to generate.")
	}

	nonceBytes, err = hex.DecodeString(*nonce)
	if err != nil {
		log.Fatal("Error decoding hex nonce:", err)
	}
	if len(nonceBytes) > 16 {
		log.Fatal("Invalid nonce size for Sosemanuk. Max 16 bytes.")
	}
	if *verbose {
		fmt.Fprintf(os.Stderr, "Nonce: %d bytes\n", len(nonceBytes))
	}

	// Read input data
	buf := bytes.NewBuffer(nil)
	var data io.Reader
	if *file == "-" {
		data = os.Stdin
		if *verbose {
			fmt.Fprintln(os.Stderr, "Reading from STDIN...")
		}
	} else if *file != "" {
		data, err = os.Open(*file)
		if err != nil {
			log.Fatal("Error opening file:", err)
		}
		if *verbose {
			fmt.Fprintf(os.Stderr, "Reading from file: %s\n", *file)
		}
	} else {
		log.Fatal("Input file required. Use -f <filename> or -f - for STDIN.")
	}

	_, err = io.Copy(buf, data)
	if err != nil {
		log.Fatal("Error reading data:", err)
	}
	msg := buf.Bytes()

	if *verbose {
		fmt.Fprintf(os.Stderr, "Input size: %d bytes\n", len(msg))
		fmt.Fprintf(os.Stderr, "Mode: %s\n", map[bool]string{true: "Decrypt", false: "Encrypt"}[*dec])
	}

	// Create Sosemanuk cipher
	sosemanukCipher, err := sosemanuk.New(keyBytes, nonceBytes)
	if err != nil {
		log.Fatal("Error creating Sosemanuk cipher:", err)
	}

	// Process according to mode (encrypt/decrypt)
	output := make([]byte, len(msg))
	sosemanukCipher.Process(msg, output)

	// Output result
	_, err = os.Stdout.Write(output)
	if err != nil {
		log.Fatal("Error writing output:", err)
	}

	if *verbose {
		fmt.Fprintf(os.Stderr, "Output size: %d bytes\n", len(output))
	}
}

func generateKeyAndNonce() {
	// Generate random key (32 bytes)
	keyBytes := make([]byte, 32)
	_, err := io.ReadFull(rand.Reader, keyBytes)
	if err != nil {
		log.Fatal("Error generating random key:", err)
	}

	// Generate random nonce (16 bytes)
	nonceBytes := make([]byte, 16)
	_, err = io.ReadFull(rand.Reader, nonceBytes)
	if err != nil {
		log.Fatal("Error generating random nonce:", err)
	}

	fmt.Printf("Key (32 bytes): %s\n", hex.EncodeToString(keyBytes))
	fmt.Printf("Nonce (16 bytes): %s\n", hex.EncodeToString(nonceBytes))
	fmt.Fprintln(os.Stderr, "\n⚠️  Save these values securely! ⚠️")
	fmt.Fprintln(os.Stderr, "Key and nonce are required to decrypt the data.")
	fmt.Fprintln(os.Stderr, "Never share your key and never reuse the same (key,nonce) pair.")
}

func printUsage() {
	fmt.Fprintf(os.Stderr, `Sosemanuk Encryption Tool
Sosemanuk Stream Cipher

USAGE:
  %s [-d] -k <keyhex> -n <noncehex> -f <file.ext>
  %s -r
  %s -h

OPTIONS:
  -d            Decrypt instead of Encrypt.
  -f <file>     Target file. ('-' for STDIN)
  -k <hex>      Symmetric key (hex) to Encrypt/Decrypt. (32 bytes max)
  -n <hex>      Nonce/IV (hex) to Encrypt/Decrypt. (16 bytes max)
  -r            Generate random key (32 bytes) and nonce (16 bytes).
  -v            Verbose mode. Show details about the operation.
  -h            Show this help message.

EXAMPLES:
  # Generate key and nonce
  %s -r

  # Encrypt file
  %s -k 0123456789abcdef... -n 0011223344556677... -f secret.txt > secret.enc

  # Decrypt file
  %s -d -k 0123456789abcdef... -n 0011223344556677... -f secret.enc > secret.txt

  # Encrypt from STDIN
  echo "Hello World" | %s -k <key> -n <nonce> -f - > encrypted.hex

  # Decrypt from STDIN with verbose output
  cat secret.enc | %s -d -k <key> -n <nonce> -f - -v

NOTES:
  - Sosemanuk is a fast software-oriented stream cipher
  - Key can be 1-32 bytes (8-256 bits), nonce can be 1-16 bytes
  - NEVER reuse the same (key, nonce) pair with different data
  - Always use a random nonce for each encryption with the same key
`, os.Args[0], os.Args[0], os.Args[0], os.Args[0], os.Args[0], os.Args[0], os.Args[0], os.Args[0])
}
