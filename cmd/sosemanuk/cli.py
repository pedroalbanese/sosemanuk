#!/usr/bin/env python3
# -*- coding: utf-8 -*-

"""
Sosemanuk Stream Cipher CLI
Usage: python sosemanuk_cli.py -k <keyhex> -n <noncehex> -f <file>
"""

import os
import sys
import argparse
import binascii
from sosemanuk import Sosemanuk


def show_help():
    """Mostra ajuda"""
    print("Sosemanuk Stream Cipher")
    print("Usage: python sosemanuk_cli.py -k <keyhex> -n <noncehex> -f <file>")
    print("  -f, --file <file>    Target file. ('-' for STDIN)")
    print("  -k, --key <keyhex>   Symmetric key (hex) (32 bytes max)")
    print("  -n, --nonce <hex>    Nonce/IV (hex) (16 bytes max)")
    print("  -r, --random         Generate random key (32 bytes) and nonce (16 bytes)")
    print("  -v, --verbose        Verbose mode")
    print("  -V, --version        Show version")
    print("  -h, --help           Show this help")


def main():
    """Função principal"""
    
    # Configurar argument parser
    parser = argparse.ArgumentParser(
        description="Sosemanuk Stream Cipher CLI",
        add_help=False  # Desabilitar help padrão para usar o nosso
    )
    
    parser.add_argument("-f", "--file", help="Target file. ('-' for STDIN)")
    parser.add_argument("-k", "--key", help="Symmetric key (hex) (32 bytes max)")
    parser.add_argument("-n", "--nonce", help="Nonce/IV (hex) (16 bytes max)")
    parser.add_argument("-r", "--random", action="store_true", help="Generate random key (32 bytes) and nonce (16 bytes)")
    parser.add_argument("-v", "--verbose", action="store_true", help="Verbose mode")
    parser.add_argument("-V", "--version", action="store_true", help="Show version")
    parser.add_argument("-h", "--help", action="store_true", help="Show this help")
    
    # Parse arguments
    args = parser.parse_args()
    
    # Show version
    if args.version:
        print("Sosemanuk Stream Cipher CLI v1.0.0 (Python)")
        return 0
    
    # Show help
    if args.help:
        show_help()
        return 0
    
    # Generate random key and nonce
    if args.random:
        key_bytes = os.urandom(32)
        nonce_bytes = os.urandom(16)
        print(f"Key: {binascii.hexlify(key_bytes).decode()}")
        print(f"Nonce: {binascii.hexlify(nonce_bytes).decode()}")
        return 0
    
    # Check required arguments
    if not args.key or not args.nonce or not args.file:
        print("Error: Missing required arguments", file=sys.stderr)
        show_help()
        return 1
    
    # Decode key hex
    try:
        key_bytes = binascii.unhexlify(args.key)
        if len(key_bytes) > 32:
            raise ValueError("Key too long (max 32 bytes)")
    except Exception as e:
        print(f"Invalid key: {e}", file=sys.stderr)
        return 1
    
    # Decode nonce hex
    try:
        nonce_bytes = binascii.unhexlify(args.nonce)
        if len(nonce_bytes) > 16:
            raise ValueError("Nonce too long (max 16 bytes)")
    except Exception as e:
        print(f"Invalid nonce: {e}", file=sys.stderr)
        return 1
    
    # Verbose mode
    verbose = args.verbose
    if verbose:
        print(f"Key length: {len(key_bytes)} bytes", file=sys.stderr)
        print(f"Nonce length: {len(nonce_bytes)} bytes", file=sys.stderr)
        print(f"Input file: {args.file}", file=sys.stderr)
    
    # Read input data
    input_data = b''
    if args.file == '-':
        # Read from STDIN
        if verbose:
            print("Reading from STDIN...", file=sys.stderr)
        try:
            input_data = sys.stdin.buffer.read()
        except Exception as e:
            print(f"Error reading from STDIN: {e}", file=sys.stderr)
            return 1
    else:
        # Read from file
        if not os.path.exists(args.file):
            print(f"File not found: {args.file}", file=sys.stderr)
            return 1
        if verbose:
            print(f"Reading from file: {args.file}", file=sys.stderr)
        try:
            with open(args.file, 'rb') as f:
                input_data = f.read()
        except Exception as e:
            print(f"Error reading file: {e}", file=sys.stderr)
            return 1
    
    # Process with Sosemanuk
    try:
        if verbose:
            print("Initializing Sosemanuk cipher...", file=sys.stderr)
        
        cipher = Sosemanuk(key_bytes, nonce_bytes)
        
        if verbose:
            print(f"Processing {len(input_data)} bytes...", file=sys.stderr)
        
        # Process data
        output = cipher.process(input_data)
        
        # Write output to STDOUT
        sys.stdout.buffer.write(output)
        
        if verbose:
            print("Done.", file=sys.stderr)
        
    except Exception as e:
        print(f"Error: {e}", file=sys.stderr)
        return 1
    
    return 0


# Wrapper functions para compatibilidade com estilo PHP

def encrypt_file(key_hex, nonce_hex, input_file, output_file=None):
    """Criptografa um arquivo com Sosemanuk"""
    try:
        # Decodificar chave e nonce
        key = binascii.unhexlify(key_hex)
        nonce = binascii.unhexlify(nonce_hex)
        
        # Ler arquivo de entrada
        with open(input_file, 'rb') as f:
            data = f.read()
        
        # Criptografar
        cipher = Sosemanuk(key, nonce)
        encrypted = cipher.process(data)
        
        # Escrever arquivo de saída
        if output_file:
            with open(output_file, 'wb') as f:
                f.write(encrypted)
        else:
            # Se não especificado, sobrescrever o original
            with open(input_file, 'wb') as f:
                f.write(encrypted)
        
        return True, len(data)
        
    except Exception as e:
        return False, str(e)


def decrypt_file(key_hex, nonce_hex, input_file, output_file=None):
    """Descriptografa um arquivo com Sosemanuk (mesmo processo)"""
    # Sosemanuk é um stream cipher, então encrypt e decrypt são iguais
    return encrypt_file(key_hex, nonce_hex, input_file, output_file)


def encrypt_string(key_hex, nonce_hex, text, encoding='utf-8'):
    """Criptografa uma string com Sosemanuk"""
    try:
        key = binascii.unhexlify(key_hex)
        nonce = binascii.unhexlify(nonce_hex)
        
        if isinstance(text, str):
            data = text.encode(encoding)
        else:
            data = text
        
        cipher = Sosemanuk(key, nonce)
        encrypted = cipher.process(data)
        
        return True, binascii.hexlify(encrypted).decode()
        
    except Exception as e:
        return False, str(e)


def decrypt_string(key_hex, nonce_hex, hex_data, encoding='utf-8'):
    """Descriptografa uma string com Sosemanuk"""
    try:
        key = binascii.unhexlify(key_hex)
        nonce = binascii.unhexlify(nonce_hex)
        data = binascii.unhexlify(hex_data)
        
        cipher = Sosemanuk(key, nonce)
        decrypted = cipher.process(data)
        
        return True, decrypted.decode(encoding)
        
    except Exception as e:
        return False, str(e)


def generate_key_nonce():
    """Gera uma chave e nonce aleatórios"""
    key = os.urandom(32)
    nonce = os.urandom(16)
    return {
        'key_hex': binascii.hexlify(key).decode(),
        'nonce_hex': binascii.hexlify(nonce).decode(),
        'key_bytes': key,
        'nonce_bytes': nonce
    }


if __name__ == "__main__":
    sys.exit(main())
