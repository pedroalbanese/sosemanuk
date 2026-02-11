# sosemanuk
Sosemanuk Stream Cipher in Pure Go

## Usage

```go
package main

import (
    "fmt"
    "log"
    "github.com/yourusername/sosemanuk"
)

func main() {
    // Key: 1-32 bytes, Nonce: 1-16 bytes
    key := []byte("32byte-key-example-1234567890!!")
    nonce := []byte("16byte-nonce-ex")
    
    // Create cipher
    cipher, err := sosemanuk.New(key, nonce)
    if err != nil {
        log.Fatal(err)
    }
    
    plaintext := []byte("Hello, Sosemanuk!")
    ciphertext := make([]byte, len(plaintext))
    
    // Encrypt
    cipher.Process(plaintext, ciphertext)
    fmt.Printf("Encrypted: %x\n", ciphertext)
    
    // Decrypt (same operation)
    cipher.Process(ciphertext, plaintext)
    fmt.Printf("Decrypted: %s\n", plaintext)
}
```

## License

This project is licensed under the ISC License.

#### Copyright (c) 2020-2026 Pedro F. Albanese - ALBANESE Research Lab.  
Todos os direitos de propriedade intelectual sobre este software pertencem ao autor, Pedro F. Albanese. Vide Lei 9.610/98, Art. 7º, inciso XII.
