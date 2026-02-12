# Sosemanuk
Sosemanuk Stream Cipher in Pure Go

**SOSEMANUK** is a synchronous stream cipher, optimized for software implementation. It was one of the four finalists in Profile 1 (high software efficiency) of the eSTREAM project, alongside HC-128, Rabbit, and Salsa20/12.

---

## Name Origin

The name comes from the **Cree** language (Native North American peoples) and means **"snow snake"** , a direct reference to the two algorithms that inspired it:

- **SNOW** 2.0
- **SERPENT**

https://en.wikipedia.org/wiki/SOSEMANUK

---

## Authors

It was developed by a group of French cryptographers led by **Come Berbain**, including:

- Anne Canteaut
- Nicolas Courtois
- Henri Gilbert
- Thomas Pornin
- and others

---

## Main Characteristics

| Characteristic | Specification |
|----------------|---------------|
| Type | Synchronous stream cipher |
| Key size | 128 to 256 bits (variable) |
| Initialization Vector (IV) | 128 bits |
| Guaranteed security | 128 bits (independent of key size) |
| License | Patent-free, "free for any use" |
| Internal state | 384 bits (10-word 32-bit LFSR + 64-bit FSM) |

---

## Structure

SOSEMANUK combines elements from two established algorithms:

### SNOW 2.0
- Inherits the **LFSR** (Linear Feedback Shift Register)
- Inherits the **FSM** (Finite State Machine) concept

### SERPENT
- Uses reduced versions called:
  - **Serpent1** — one round without key addition and linear transformation
  - **Serpent24** — SERPENT version with 24 rounds

These components are used in initialization and output transformation.

---

## Main Components

| Component | Description |
|-----------|-------------|
| LFSR | 10-element shift register over 𝔽₂³², with feedback polynomial `π(X) = αX¹⁰ + α⁻¹X⁷ + X + 1` |
| FSM | Contains two 32-bit registers (R1 and R2) and produces 32-bit output per cycle |
| Output transformation | Every 4 cycles, applies Serpent1 to 4 output words from FSM and XORs with LFSR values |

---

## Performance and Improvements over SNOW 2.0

- Faster IV initialization procedure
- Reduced internal state (10 words vs 16 words in SNOW)
- Less static data, reducing cache pressure
- Better mapping to processor registers

---

## Security

- The algorithm is patent-free and free for any use
- No practical attacks break the claimed 128-bit security
- The most efficient theoretical attack has complexity ~2¹⁴⁷·⁸⁸, still above 128 bits
- 2005 studies demonstrated that keys below 226 bits are theoretically vulnerable, confirming that actual security is 128 bits

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
