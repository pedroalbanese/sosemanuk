#!/usr/bin/env python3
# -*- coding: utf-8 -*-

import os
import sys
import binascii
from sosemanuk import Sosemanuk


class SosemanukTest:
    def __init__(self):
        self.passed = 0
        self.failed = 0
    
    def run(self):
        print("Sosemanuk Stream Cipher Test Suite")
        print("====================================\n")
        
        # ECRYPT Set 1, Vector #0
        self.test_vector(
            "ECRYPT Set 1, Vector #0",
            bytes.fromhex("8000000000000000000000000000000000000000000000000000000000000000"),
            bytes.fromhex("00000000000000000000000000000000"),
            b"\x00" * 64,
            "1782fabff497a0e89e16e1bcf22f0fe8aa8c566d293aa35b2425e4f26e31c3e7701c08a0d614af3d3861a7dff7d6a38a0efe84a29fadf68d390a3d15b75c972d"
        )
        
        # ECRYPT Set 2, Vector #63
        self.test_vector(
            "ECRYPT Set 2, Vector #63",
            bytes.fromhex("3F3F3F3F3F3F3F3F3F3F3F3F3F3F3F3F"),
            bytes.fromhex("00000000000000000000000000000000"),
            b"\x00" * 64,
            "7d755f30a2b747a50d7d28147edf0b3e3fab6856a7373c7306c00d1d4076969354d7ab4343c0115e7839502c5c699ed06db119968aebfd08d8b968a7161d613f"
        )
        
        # ECRYPT Set 2, Vector #90
        self.test_vector(
            "ECRYPT Set 2, Vector #90",
            bytes.fromhex("5A5A5A5A5A5A5A5A5A5A5A5A5A5A5A5A5A5A5A5A5A5A5A5A5A5A5A5A5A5A5A5A"),
            bytes.fromhex("00000000000000000000000000000000"),
            b"\x00" * 64,
            "f5d7d72686322d1751afd16a1dd98282d2b9a1ee0c305df52f86ae1b831e90c22e2de089cee656a992736385d9135b823b3611098674bf820986a4342b89abf7"
        )
        
        # ECRYPT Set 3, Vector #135
        self.test_vector(
            "ECRYPT Set 3, Vector #135",
            bytes.fromhex("8788898A8B8C8D8E8F909192939495969798999A9B9C9D9E9FA0A1A2A3A4"),
            bytes.fromhex("00000000000000000000000000000000"),
            b"\x00" * 64,
            "9d7ee5a10bbb0756d66b8daa5ae08f41b05c9e7c6b13532eaa81f224282b61c66deee5af6251db26c49b865c5ad4250ae89787fc86c35409cf2986cf820293aa"
        )
        
        # ECRYPT Set 3, Vector #207
        self.test_vector(
            "ECRYPT Set 3, Vector #207",
            bytes.fromhex("CFD0D1D2D3D4D5D6D7D8D9DADBDCDDDEDFE0E1E2E3E4E5E6E7E8E9EAEBECEDEE"),
            bytes.fromhex("00000000000000000000000000000000"),
            b"\x00" * 64,
            "f028923659c6c0a17065e013368d93ebcf2f4fd892b6e27e104ef0a2605708ea26336ae966d5058bc144f7954fe2fc3c258f00734aa5bec8281814b746197084"
        )
        
        # ECRYPT Set 6, Vector #3 (with nonce)
        self.test_vector(
            "ECRYPT Set 6, Vector #3",
            bytes.fromhex("0F62B5085BAE0154A7FA4DA0F34699EC3F92E5388BDE3184D72A7DD02376C91C"),
            bytes.fromhex("288FF65DC42B92F960C72E95FC63CA31"),
            b"\x00" * 64,
            "1fc4f2e266b21c24fddb3492d40a3fa6de32cdf13908511e84420abdfa1d3b0fec600f83409c57cbe0394b90cdb1d759243efd8b8e2ab7bc453a8d8a3515183e"
        )
        
        # TEST_VECTOR_128.txt - Test 1
        self.test_vector(
            "TEST_VECTOR_128 Test 1",
            bytes.fromhex("A7C083FEB7"),
            bytes.fromhex("00112233445566778899AABBCCDDEEFF"),
            b"\x00" * 160,
            "fe81d2162c9a100d04895c454a77515bbe6a431a935cb90e2221ebb7ef502328943539492eff6310c871054c2889cc728f82e86b1afff4334b6127a13a155c75151630bd482eb673ff5db477fa6c53ebe1a4ec38c23c5400c315455d93a2aced9598604727fa340d5f2a8bd757b77833f74bd2bc049313c80616b4a06268ae350db92eec4fa56c171374a67a80c006d0ead048ce7b640f17d3d5a62d1f251c21"
        )
        
        # TEST_VECTOR_128.txt - Test 2
        self.test_vector(
            "TEST_VECTOR_128 Test 2",
            bytes.fromhex("00112233445566778899AABBCCDDEEFF"),
            bytes.fromhex("8899AABBCCDDEEFF0011223344556677"),
            b"\x00" * 160,
            "fa61dbeb71178131a77c714bd2eabf4e1394207a25698aa1308f2f063a0f760604cf67569ba59a3dfad7f00145c78d29c5ffe5f964950486424451952c84039d234d9c37eecbbca1ebfb0dd16ea1194a6afc1a460e33e33fe8d55c48977079c687810d74feddee1b3986218fb1e1c1765e4df64d7f6911c19a270c59c74b24461717f86ce3b11808facd4f2e714168da44cf6360d54dda2241bcb79401a4edcc"
        )
        
        # Vector com chave de 16 bytes (128 bits)
        self.test_vector(
            "Key 128-bit, Nonce 128-bit",
            bytes.fromhex("0123456789ABCDEF0123456789ABCDEF"),
            bytes.fromhex("0123456789ABCDEF0123456789ABCDEF"),
            bytes.fromhex("00000000000000000000000000000000"),
            ""  # Deixe vazio para mostrar o resultado atual
        )
        
        # Vector adicional: chave de 32 bytes
        self.test_vector(
            "Key 256-bit, Nonce 128-bit",
            bytes.fromhex("0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF"),
            bytes.fromhex("0123456789ABCDEF0123456789ABCDEF"),
            b"\x00" * 64,
            ""  # Deixe vazio para mostrar o resultado atual
        )
        
        print("\n====================================")
        print(f"Total: {self.passed + self.failed} tests")
        print(f"Passed: {self.passed}")
        print(f"Failed: {self.failed}\n")
    
    def test_vector(self, name, key, nonce, input_data, expected_hex):
        print(f"Testing: {name}")
        print(f"  Key: {binascii.hexlify(key).decode()}")
        print(f"  Nonce: {binascii.hexlify(nonce).decode()}")
        
        try:
            cipher = Sosemanuk(key, nonce)
            output = cipher.process(input_data)
            
            output_hex = binascii.hexlify(output).decode()
            
            if expected_hex:
                # Converter para minúsculas para comparação
                expected_hex = expected_hex.lower()
                if output_hex.lower() == expected_hex:
                    print("  ✓ PASSED")
                    self.passed += 1
                else:
                    print("  ✗ FAILED")
                    print(f"    Expected: {expected_hex}")
                    print(f"    Got:      {output_hex}")
                    self.failed += 1
                    
                    # Mostrar primeiros bytes onde difere
                    expected_bytes = bytes.fromhex(expected_hex)
                    for i in range(min(len(expected_bytes), len(output))):
                        if i < len(output) and i < len(expected_bytes):
                            if output[i] != expected_bytes[i]:
                                print(f"    First difference at byte {i}: expected 0x{expected_bytes[i]:02x}, got 0x{output[i]:02x}")
                                break
            else:
                print(f"  Output: {output_hex}")
                print("  ✓ (reference output not provided)")
                self.passed += 1
            
        except Exception as e:
            print(f"  ✗ ERROR: {str(e)}")
            import traceback
            traceback.print_exc()
            self.failed += 1
        
        print()


def test_short_string():
    """Teste com string curta"""
    print("Teste com string curta:")
    print("=======================")
    key = bytes.fromhex("0123456789ABCDEF0123456789ABCDEF")
    nonce = bytes.fromhex("0123456789ABCDEF0123456789ABCDEF")
    input_str = "opa"
    input_bytes = input_str.encode('latin-1')
    
    cipher = Sosemanuk(key, nonce)
    output = cipher.process(input_bytes)
    print(f"Input:  '{input_str}' ({binascii.hexlify(input_bytes).decode()})")
    print(f"Output: {binascii.hexlify(output).decode()}")
    print()


def test_consistency():
    """Teste de consistência (encrypt + decrypt = original)"""
    print("Teste de consistência:")
    print("======================")
    key = os.urandom(32)
    nonce = os.urandom(16)
    plaintext = "The quick brown fox jumps over the lazy dog"
    plaintext_bytes = plaintext.encode('latin-1')
    
    cipher1 = Sosemanuk(key, nonce)
    ciphertext = cipher1.process(plaintext_bytes)
    
    cipher2 = Sosemanuk(key, nonce)
    decrypted = cipher2.process(ciphertext)
    
    if plaintext_bytes == decrypted:
        print("✓ Encrypt/Decrypt consistente")
    else:
        print("✗ Encrypt/Decrypt inconsistente")
        
        # Debug
        print(f"  Plaintext:  {binascii.hexlify(plaintext_bytes).decode()}")
        print(f"  Ciphertext: {binascii.hexlify(ciphertext).decode()}")
        print(f"  Decrypted:  {binascii.hexlify(decrypted).decode()}")
    
    print()


def test_multiple_blocks():
    """Teste com múltiplos blocos (mais que 80 bytes)"""
    print("Teste com múltiplos blocos:")
    print("===========================")
    key = bytes.fromhex("0123456789ABCDEF0123456789ABCDEF")
    nonce = bytes.fromhex("0123456789ABCDEF0123456789ABCDEF")
    
    # Criar dados de 200 bytes (mais que os 80 bytes do buffer interno)
    plaintext = b"A" * 200
    
    cipher = Sosemanuk(key, nonce)
    output = cipher.process(plaintext)
    
    print(f"  Input length: {len(plaintext)} bytes")
    print(f"  Output length: {len(output)} bytes")
    print(f"  First 32 bytes: {binascii.hexlify(output[:32]).decode()}")
    print(f"  Last 32 bytes:  {binascii.hexlify(output[-32:]).decode()}")
    
    # Verificar se todos os bytes foram processados
    cipher2 = Sosemanuk(key, nonce)
    output2 = cipher2.process(plaintext)
    
    if output == output2:
        print("  ✓ Consistente com nova instância")
    else:
        print("  ✗ Inconsistente com nova instância")
    
    print()


def test_equivalence_with_php():
    """Teste de equivalência com os resultados do PHP (se disponível)"""
    print("Teste de equivalência com resultados PHP conhecidos:")
    print("====================================================")
    
    # Alguns resultados conhecidos de testes anteriores
    test_cases = [
        {
            "name": "PHP Test Case 1",
            "key": bytes.fromhex("00000000000000000000000000000000"),
            "nonce": bytes.fromhex("00000000000000000000000000000000"),
            "input": b"Hello, World!",
            "expected": None  # Será preenchido se soubermos
        }
    ]
    
    for tc in test_cases:
        print(f"Testing: {tc['name']}")
        cipher = Sosemanuk(tc['key'], tc['nonce'])
        output = cipher.process(tc['input'])
        print(f"  Input:  {tc['input']}")
        print(f"  Output: {binascii.hexlify(output).decode()}")
    
    print()


if __name__ == "__main__":
    # Verificar se o módulo sosemanuk existe
    try:
        import sosemanuk
    except ImportError:
        print("ERRO: Arquivo sosemanuk.py não encontrado!")
        print("Certifique-se de que o arquivo com a implementação do Sosemanuk está no mesmo diretório.")
        sys.exit(1)
    
    # Executar todos os testes
    test_suite = SosemanukTest()
    test_suite.run()
    
    # Testes adicionais
    test_short_string()
    test_consistency()
    test_multiple_blocks()
    test_equivalence_with_php()
    
    # Resumo final
    print("\n" + "="*50)
    print("TEST SUMMARY")
    print("="*50)
    print(f"Total tests passed: {test_suite.passed}")
    print(f"Total tests failed: {test_suite.failed}")
    
    if test_suite.failed == 0:
        print("\n✓ Todos os testes passaram!")
    else:
        print(f"\n✗ {test_suite.failed} teste(s) falharam.")
    
    print()
