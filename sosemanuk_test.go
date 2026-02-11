package sosemanuk

import (
	"encoding/hex"
	"testing"
)

func fromHex(s string) []byte {
	b, err := hex.DecodeString(s)
	if err != nil {
		panic(err)
	}
	return b
}

// Vectors from http://www.ecrypt.eu.org/stream/svn/viewcvs.cgi/ecrypt/trunk/submissions/sosemanuk/unverified.test-vectors?rev=108&view=markup

func TestSosemanukECRYPT_Set1_Vector0(t *testing.T) {
	key := fromHex("8000000000000000000000000000000000000000000000000000000000000000")
	nonce := fromHex("00000000000000000000000000000000")

	input := make([]byte, 64)
	expectedOutputHex := "1782FABFF497A0E89E16E1BCF22F0FE8AA8C566D293AA35B2425E4F26E31C3E7701C08A0D614AF3D3861A7DFF7D6A38A0EFE84A29FADF68D390A3D15B75C972D"
	expectedOutput := fromHex(expectedOutputHex)

	output := make([]byte, 64)

	s, err := New(key, nonce)
	if err != nil {
		t.Fatal(err)
	}
	s.Process(input, output)

	for i := 0; i < len(output); i++ {
		if output[i] != expectedOutput[i] {
			t.Errorf("byte %d: expected %02x, got %02x", i, expectedOutput[i], output[i])
		}
	}
}

func TestSosemanukECRYPT_Set2_Vector63(t *testing.T) {
	key := fromHex("3F3F3F3F3F3F3F3F3F3F3F3F3F3F3F3F")
	nonce := fromHex("00000000000000000000000000000000")

	input := make([]byte, 64)
	expectedOutputHex := "7D755F30A2B747A50D7D28147EDF0B3E3FAB6856A7373C7306C00D1D4076969354D7AB4343C0115E7839502C5C699ED06DB119968AEBFD08D8B968A7161D613F"
	expectedOutput := fromHex(expectedOutputHex)

	output := make([]byte, 64)

	s, err := New(key, nonce)
	if err != nil {
		t.Fatal(err)
	}
	s.Process(input, output)

	for i := 0; i < len(output); i++ {
		if output[i] != expectedOutput[i] {
			t.Errorf("byte %d: expected %02x, got %02x", i, expectedOutput[i], output[i])
		}
	}
}

func TestSosemanukECRYPT_Set2_Vector90(t *testing.T) {
	key := fromHex("5A5A5A5A5A5A5A5A5A5A5A5A5A5A5A5A5A5A5A5A5A5A5A5A5A5A5A5A5A5A5A5A")
	nonce := fromHex("00000000000000000000000000000000")

	input := make([]byte, 64)
	expectedOutputHex := "F5D7D72686322D1751AFD16A1DD98282D2B9A1EE0C305DF52F86AE1B831E90C22E2DE089CEE656A992736385D9135B823B3611098674BF820986A4342B89ABF7"
	expectedOutput := fromHex(expectedOutputHex)

	output := make([]byte, 64)

	s, err := New(key, nonce)
	if err != nil {
		t.Fatal(err)
	}
	s.Process(input, output)

	for i := 0; i < len(output); i++ {
		if output[i] != expectedOutput[i] {
			t.Errorf("byte %d: expected %02x, got %02x", i, expectedOutput[i], output[i])
		}
	}
}

func TestSosemanukECRYPT_Set3_Vector135(t *testing.T) {
	key := fromHex("8788898A8B8C8D8E8F909192939495969798999A9B9C9D9E9FA0A1A2A3A4")
	nonce := fromHex("00000000000000000000000000000000")

	input := make([]byte, 64)
	expectedOutputHex := "9D7EE5A10BBB0756D66B8DAA5AE08F41B05C9E7C6B13532EAA81F224282B61C66DEEE5AF6251DB26C49B865C5AD4250AE89787FC86C35409CF2986CF820293AA"
	expectedOutput := fromHex(expectedOutputHex)

	output := make([]byte, 64)

	s, err := New(key, nonce)
	if err != nil {
		t.Fatal(err)
	}
	s.Process(input, output)

	for i := 0; i < len(output); i++ {
		if output[i] != expectedOutput[i] {
			t.Errorf("byte %d: expected %02x, got %02x", i, expectedOutput[i], output[i])
		}
	}
}

func TestSosemanukECRYPT_Set3_Vector207(t *testing.T) {
	key := fromHex("CFD0D1D2D3D4D5D6D7D8D9DADBDCDDDEDFE0E1E2E3E4E5E6E7E8E9EAEBECEDEE")
	nonce := fromHex("00000000000000000000000000000000")

	input := make([]byte, 64)
	expectedOutputHex := "F028923659C6C0A17065E013368D93EBCF2F4FD892B6E27E104EF0A2605708EA26336AE966D5058BC144F7954FE2FC3C258F00734AA5BEC8281814B746197084"
	expectedOutput := fromHex(expectedOutputHex)

	output := make([]byte, 64)

	s, err := New(key, nonce)
	if err != nil {
		t.Fatal(err)
	}
	s.Process(input, output)

	for i := 0; i < len(output); i++ {
		if output[i] != expectedOutput[i] {
			t.Errorf("byte %d: expected %02x, got %02x", i, expectedOutput[i], output[i])
		}
	}
}

func TestSosemanukECRYPT_Set6_Vector3(t *testing.T) {
	key := fromHex("0F62B5085BAE0154A7FA4DA0F34699EC3F92E5388BDE3184D72A7DD02376C91C")
	nonce := fromHex("288FF65DC42B92F960C72E95FC63CA31")

	input := make([]byte, 64)
	expectedOutputHex := "1FC4F2E266B21C24FDDB3492D40A3FA6DE32CDF13908511E84420ABDFA1D3B0FEC600F83409C57CBE0394B90CDB1D759243EFD8B8E2AB7BC453A8D8A3515183E"
	expectedOutput := fromHex(expectedOutputHex)

	output := make([]byte, 64)

	s, err := New(key, nonce)
	if err != nil {
		t.Fatal(err)
	}
	s.Process(input, output)

	for i := 0; i < len(output); i++ {
		if output[i] != expectedOutput[i] {
			t.Errorf("byte %d: expected %02x, got %02x", i, expectedOutput[i], output[i])
		}
	}
}

// From TEST_VECTOR_128.txt from reference C implementation
func TestSosemanukVector128_Test1(t *testing.T) {
	key := fromHex("A7C083FEB7")
	nonce := fromHex("00112233445566778899AABBCCDDEEFF")

	input := make([]byte, 160)
	expectedOutputHex := "FE81D2162C9A100D04895C454A77515BBE6A431A935CB90E2221EBB7EF502328943539492EFF6310C871054C2889CC728F82E86B1AFFF4334B6127A13A155C75151630BD482EB673FF5DB477FA6C53EBE1A4EC38C23C5400C315455D93A2ACED9598604727FA340D5F2A8BD757B77833F74BD2BC049313C80616B4A06268AE350DB92EEC4FA56C171374A67A80C006D0EAD048CE7B640F17D3D5A62D1F251C21"
	expectedOutput := fromHex(expectedOutputHex)

	output := make([]byte, 160)

	s, err := New(key, nonce)
	if err != nil {
		t.Fatal(err)
	}
	s.Process(input, output)

	for i := 0; i < len(output); i++ {
		if output[i] != expectedOutput[i] {
			t.Errorf("byte %d: expected %02x, got %02x", i, expectedOutput[i], output[i])
		}
	}
}

func TestSosemanukVector128_Test2(t *testing.T) {
	key := fromHex("00112233445566778899AABBCCDDEEFF")
	nonce := fromHex("8899AABBCCDDEEFF0011223344556677")

	input := make([]byte, 160)
	expectedOutputHex := "FA61DBEB71178131A77C714BD2EABF4E1394207A25698AA1308F2F063A0F760604CF67569BA59A3DFAD7F00145C78D29C5FFE5F964950486424451952C84039D234D9C37EECBBCA1EBFB0DD16EA1194A6AFC1A460E33E33FE8D55C48977079C687810D74FEDDEE1B3986218FB1E1C1765E4DF64D7F6911C19A270C59C74B24461717F86CE3B11808FACD4F2E714168DA44CF6360D54DDA2241BCB79401A4EDCC"
	expectedOutput := fromHex(expectedOutputHex)

	output := make([]byte, 160)

	s, err := New(key, nonce)
	if err != nil {
		t.Fatal(err)
	}
	s.Process(input, output)

	for i := 0; i < len(output); i++ {
		if output[i] != expectedOutput[i] {
			t.Errorf("byte %d: expected %02x, got %02x", i, expectedOutput[i], output[i])
		}
	}
}

func TestKeyLengthValidation(t *testing.T) {
	// Chave muito longa
	key := make([]byte, 33)
	nonce := make([]byte, 16)
	
	_, err := New(key, nonce)
	if err == nil {
		t.Error("expected error for key length > 32, got nil")
	}
}

func TestNonceLengthValidation(t *testing.T) {
	key := make([]byte, 16)
	nonce := make([]byte, 17)
	
	_, err := New(key, nonce)
	if err == nil {
		t.Error("expected error for nonce length > 16, got nil")
	}
}

func BenchmarkSosemanuk10(b *testing.B) {
	s, _ := New(make([]byte, 32), make([]byte, 16))
	input := make([]byte, 10)
	output := make([]byte, 10)
	
	b.ResetTimer()
	for i := 0; i < b.N; i++ {
		s.Process(input, output)
	}
	b.SetBytes(10)
}

func BenchmarkSosemanuk1k(b *testing.B) {
	s, _ := New(make([]byte, 32), make([]byte, 16))
	input := make([]byte, 1024)
	output := make([]byte, 1024)
	
	b.ResetTimer()
	for i := 0; i < b.N; i++ {
		s.Process(input, output)
	}
	b.SetBytes(1024)
}

func BenchmarkSosemanuk64k(b *testing.B) {
	s, _ := New(make([]byte, 32), make([]byte, 16))
	input := make([]byte, 65536)
	output := make([]byte, 65536)
	
	b.ResetTimer()
	for i := 0; i < b.N; i++ {
		s.Process(input, output)
	}
	b.SetBytes(65536)
}
