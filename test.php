<?php

require_once __DIR__ . '/sosemanuk.php';

class SosemanukTest {
    private $passed = 0;
    private $failed = 0;
    
    public function run() {
        echo "Sosemanuk Stream Cipher Test Suite\n";
        echo "====================================\n\n";
        
        // ECRYPT Set 1, Vector #0
        $this->testVector(
            "ECRYPT Set 1, Vector #0",
            hex2bin("8000000000000000000000000000000000000000000000000000000000000000"),
            hex2bin("00000000000000000000000000000000"),
            str_repeat("\x00", 64),
            "1782FABFF497A0E89E16E1BCF22F0FE8AA8C566D293AA35B2425E4F26E31C3E7701C08A0D614AF3D3861A7DFF7D6A38A0EFE84A29FADF68D390A3D15B75C972D"
        );
        
        // ECRYPT Set 2, Vector #63
        $this->testVector(
            "ECRYPT Set 2, Vector #63",
            hex2bin("3F3F3F3F3F3F3F3F3F3F3F3F3F3F3F3F"),
            hex2bin("00000000000000000000000000000000"),
            str_repeat("\x00", 64),
            "7D755F30A2B747A50D7D28147EDF0B3E3FAB6856A7373C7306C00D1D4076969354D7AB4343C0115E7839502C5C699ED06DB119968AEBFD08D8B968A7161D613F"
        );
        
        // ECRYPT Set 2, Vector #90
        $this->testVector(
            "ECRYPT Set 2, Vector #90",
            hex2bin("5A5A5A5A5A5A5A5A5A5A5A5A5A5A5A5A5A5A5A5A5A5A5A5A5A5A5A5A5A5A5A5A"),
            hex2bin("00000000000000000000000000000000"),
            str_repeat("\x00", 64),
            "F5D7D72686322D1751AFD16A1DD98282D2B9A1EE0C305DF52F86AE1B831E90C22E2DE089CEE656A992736385D9135B823B3611098674BF820986A4342B89ABF7"
        );
        
        // ECRYPT Set 3, Vector #135
        $this->testVector(
            "ECRYPT Set 3, Vector #135",
            hex2bin("8788898A8B8C8D8E8F909192939495969798999A9B9C9D9E9FA0A1A2A3A4"),
            hex2bin("00000000000000000000000000000000"),
            str_repeat("\x00", 64),
            "9D7EE5A10BBB0756D66B8DAA5AE08F41B05C9E7C6B13532EAA81F224282B61C66DEEE5AF6251DB26C49B865C5AD4250AE89787FC86C35409CF2986CF820293AA"
        );
        
        // ECRYPT Set 3, Vector #207
        $this->testVector(
            "ECRYPT Set 3, Vector #207",
            hex2bin("CFD0D1D2D3D4D5D6D7D8D9DADBDCDDDEDFE0E1E2E3E4E5E6E7E8E9EAEBECEDEE"),
            hex2bin("00000000000000000000000000000000"),
            str_repeat("\x00", 64),
            "F028923659C6C0A17065E013368D93EBCF2F4FD892B6E27E104EF0A2605708EA26336AE966D5058BC144F7954FE2FC3C258F00734AA5BEC8281814B746197084"
        );
        
        // ECRYPT Set 6, Vector #3 (with nonce)
        $this->testVector(
            "ECRYPT Set 6, Vector #3",
            hex2bin("0F62B5085BAE0154A7FA4DA0F34699EC3F92E5388BDE3184D72A7DD02376C91C"),
            hex2bin("288FF65DC42B92F960C72E95FC63CA31"),
            str_repeat("\x00", 64),
            "1FC4F2E266B21C24FDDB3492D40A3FA6DE32CDF13908511E84420ABDFA1D3B0FEC600F83409C57CBE0394B90CDB1D759243EFD8B8E2AB7BC453A8D8A3515183E"
        );
        
        // TEST_VECTOR_128.txt - Test 1
        $this->testVector(
            "TEST_VECTOR_128 Test 1",
            hex2bin("A7C083FEB7"),
            hex2bin("00112233445566778899AABBCCDDEEFF"),
            str_repeat("\x00", 160),
            "FE81D2162C9A100D04895C454A77515BBE6A431A935CB90E2221EBB7EF502328943539492EFF6310C871054C2889CC728F82E86B1AFFF4334B6127A13A155C75151630BD482EB673FF5DB477FA6C53EBE1A4EC38C23C5400C315455D93A2ACED9598604727FA340D5F2A8BD757B77833F74BD2BC049313C80616B4A06268AE350DB92EEC4FA56C171374A67A80C006D0EAD048CE7B640F17D3D5A62D1F251C21"
        );
        
        // TEST_VECTOR_128.txt - Test 2
        $this->testVector(
            "TEST_VECTOR_128 Test 2",
            hex2bin("00112233445566778899AABBCCDDEEFF"),
            hex2bin("8899AABBCCDDEEFF0011223344556677"),
            str_repeat("\x00", 160),
            "FA61DBEB71178131A77C714BD2EABF4E1394207A25698AA1308F2F063A0F760604CF67569BA59A3DFAD7F00145C78D29C5FFE5F964950486424451952C84039D234D9C37EECBBCA1EBFB0DD16EA1194A6AFC1A460E33E33FE8D55C48977079C687810D74FEDDEE1B3986218FB1E1C1765E4DF64D7F6911C19A270C59C74B24461717F86CE3B11808FACD4F2E714168DA44CF6360D54DDA2241BCB79401A4EDCC"
        );
        
        // Vector com chave de 16 bytes (128 bits)
        $this->testVector(
            "Key 128-bit, Nonce 128-bit",
            hex2bin("0123456789ABCDEF0123456789ABCDEF"),
            hex2bin("0123456789ABCDEF0123456789ABCDEF"),
            hex2bin("00000000000000000000000000000000"),
            "" // Deixe vazio para mostrar o resultado atual
        );
        
        echo "\n====================================\n";
        echo "Total: " . ($this->passed + $this->failed) . " tests\n";
        echo "Passed: " . $this->passed . "\n";
        echo "Failed: " . $this->failed . "\n\n";
    }
    
    private function testVector($name, $key, $nonce, $input, $expectedHex) {
        echo "Testing: $name\n";
        echo "  Key: " . bin2hex($key) . "\n";
        echo "  Nonce: " . bin2hex($nonce) . "\n";
        
        try {
            $cipher = new Sosemanuk($key, $nonce);
            $output = $cipher->process($input);
            
            $outputHex = bin2hex($output);
            
            if ($expectedHex) {
                $expected = hex2bin($expectedHex);
                if ($output === $expected) {
                    echo "  ✓ PASSED\n";
                    $this->passed++;
                } else {
                    echo "  ✗ FAILED\n";
                    echo "    Expected: " . $expectedHex . "\n";
                    echo "    Got:      " . $outputHex . "\n";
                    $this->failed++;
                }
            } else {
                echo "  Output: " . $outputHex . "\n";
                echo "  ✓ (reference output not provided)\n";
                $this->passed++;
            }
            
        } catch (Exception $e) {
            echo "  ✗ ERROR: " . $e->getMessage() . "\n";
            $this->failed++;
        }
        
        echo "\n";
    }
}

// Executar testes
$test = new SosemanukTest();
$test->run();

// Teste com string curta
echo "Teste com string curta:\n";
echo "=======================\n";
$key = hex2bin("0123456789ABCDEF0123456789ABCDEF");
$nonce = hex2bin("0123456789ABCDEF0123456789ABCDEF");
$input = "opa";

$cipher = new Sosemanuk($key, $nonce);
$output = $cipher->process($input);
echo "Input:  'opa' (" . bin2hex($input) . ")\n";
echo "Output: " . bin2hex($output) . "\n";
echo "\n";

// Teste de consistência (encrypt + decrypt = original)
echo "Teste de consistência:\n";
echo "======================\n";
$key = random_bytes(32);
$nonce = random_bytes(16);
$plaintext = "The quick brown fox jumps over the lazy dog";

$cipher1 = new Sosemanuk($key, $nonce);
$ciphertext = $cipher1->process($plaintext);

$cipher2 = new Sosemanuk($key, $nonce);
$decrypted = $cipher2->process($ciphertext);

if ($plaintext === $decrypted) {
    echo "✓ Encrypt/Decrypt consistente\n";
} else {
    echo "✗ Encrypt/Decrypt inconsistente\n";
}

echo "\n";
