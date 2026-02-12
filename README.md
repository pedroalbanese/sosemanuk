# sosemanuk
Sosemanuk Stream Cipher in Pure Go

## Usage

```go
package main

import (
	"crypto/rand"
	"encoding/hex"
	"fmt"
	"io"
	"log"

	"github.com/yourusername/sosemanuk"
)

func main() {
	key := make([]byte, 32)
	_, err := io.ReadFull(rand.Reader, key)
	if err != nil {
		log.Fatal(err)
	}
	fmt.Println("Key:", hex.EncodeToString(key))

	nonce := make([]byte, 16)
	_, err = io.ReadFull(rand.Reader, nonce)
	if err != nil {
		log.Fatal(err)
	}
	fmt.Println("Nonce:", hex.EncodeToString(nonce))

	cipher, err := sosemanuk.New(key, nonce)
	if err != nil {
		log.Fatal(err)
	}

	plaintext := []byte("Hello, Sosemanuk!")
	ciphertext := make([]byte, len(plaintext))

	cipher.XORKeyStream(ciphertext, plaintext)
	fmt.Printf("Plaintext:  %s\n", plaintext)
	fmt.Printf("Ciphertext: %x\n", ciphertext)

	decrypted := make([]byte, len(ciphertext))
	cipher.XORKeyStream(decrypted, ciphertext)
	fmt.Printf("Decrypted:  %s\n", decrypted)
}
```

## License

This project is licensed under the ISC License.

#### Copyright (c) 2020-2026 Pedro F. Albanese - ALBANESE Research Lab.  
Todos os direitos de propriedade intelectual sobre este software pertencem ao autor, Pedro F. Albanese. Vide Lei 9.610/98, Art. 7º, inciso XII.
