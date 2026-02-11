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
	file    = flag.String("f", "", "Target file. ('-' for STDIN)")
	key     = flag.String("k", "", "Symmetric key (hex) (32 bytes max)")
	nonce   = flag.String("n", "", "Nonce/IV (hex) (16 bytes max)")
	random  = flag.Bool("r", false, "Generate random key (32 bytes) and nonce (16 bytes)")
	verbose = flag.Bool("v", false, "Verbose mode")
)

func main() {
	flag.Parse()

	if *random {
		keyBytes := make([]byte, 32)
		nonceBytes := make([]byte, 16)
		rand.Read(keyBytes)
		rand.Read(nonceBytes)
		fmt.Printf("Key: %s\n", hex.EncodeToString(keyBytes))
		fmt.Printf("Nonce: %s\n", hex.EncodeToString(nonceBytes))
		return
	}

	if *key == "" || *nonce == "" {
		fmt.Fprintln(os.Stderr, "Sosemanuk Stream Cipher")
		fmt.Fprintln(os.Stderr, "Usage: "+os.Args[0]+" -k <keyhex> -n <noncehex> -f <file>")
		flag.PrintDefaults()
		os.Exit(1)
	}

	keyBytes, err := hex.DecodeString(*key)
	if err != nil || len(keyBytes) > 32 {
		log.Fatal("Invalid key")
	}

	nonceBytes, err := hex.DecodeString(*nonce)
	if err != nil || len(nonceBytes) > 16 {
		log.Fatal("Invalid nonce")
	}

	var data io.Reader
	if *file == "-" {
		data = os.Stdin
	} else {
		f, err := os.Open(*file)
		if err != nil {
			log.Fatal(err)
		}
		defer f.Close()
		data = f
	}

	buf := new(bytes.Buffer)
	io.Copy(buf, data)
	input := buf.Bytes()

	cipher, err := sosemanuk.New(keyBytes, nonceBytes)
	if err != nil {
		log.Fatal(err)
	}

	output := make([]byte, len(input))
	cipher.Process(input, output)

	os.Stdout.Write(output)
}
