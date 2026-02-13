#!/usr/bin/env php
<?php

namespace SosemanukCLI;

require_once __DIR__ . '/sosemanuk.php';

use Sosemanuk;

// Encoding configuration
if (version_compare(PHP_VERSION, '7.4.0', '<')) {
    if (!defined('SOSEMANUK_NO_ENCODING')) {
        mb_internal_encoding('UTF-8');
    }
}

// Command line options
$shortopts = "f:k:n:rvhV";
$longopts = [
    "file:",
    "key:",
    "nonce:",
    "random",
    "verbose",
    "help",
    "version"
];

$options = getopt($shortopts, $longopts);

// Help function
function showHelp($argv) {
    echo "Sosemanuk Stream Cipher\n";
    echo "Usage: " . $argv[0] . " -k <keyhex> -n <noncehex> -f <file>\n";
    echo "  -f, --file <file>    Target file. ('-' for STDIN)\n";
    echo "  -k, --key <keyhex>   Symmetric key (hex) (32 bytes max)\n";
    echo "  -n, --nonce <hex>    Nonce/IV (hex) (16 bytes max)\n";
    echo "  -r, --random         Generate random key (32 bytes) and nonce (16 bytes)\n";
    echo "  -v, --verbose        Verbose mode\n";
    echo "  -V, --version        Show version\n";
    echo "  -h, --help           Show this help\n";
}

// Show version
if (isset($options['V']) || isset($options['version'])) {
    echo "Sosemanuk Stream Cipher CLI v1.0.0\n";
    exit(0);
}

// Show help if requested
if (isset($options['h']) || isset($options['help'])) {
    showHelp($argv);
    exit(0);
}

// Generate random key and nonce
if (isset($options['r']) || isset($options['random'])) {
    $keyBytes = random_bytes(32);
    $nonceBytes = random_bytes(16);
    
    echo "Key: " . bin2hex($keyBytes) . "\n";
    echo "Nonce: " . bin2hex($nonceBytes) . "\n";
    exit(0);
}

// Check required arguments
$key = $options['k'] ?? $options['key'] ?? null;
$nonce = $options['n'] ?? $options['nonce'] ?? null;
$file = $options['f'] ?? $options['file'] ?? null;

if ($key === null || $nonce === null || $file === null) {
    fwrite(STDERR, "Error: Missing required arguments\n");
    showHelp($argv);
    exit(1);
}

// Decode key hex
try {
    $keyBytes = hex2bin($key);
    if ($keyBytes === false || strlen($keyBytes) > 32) {
        throw new \Exception("Invalid key");
    }
} catch (\Exception $e) {
    fwrite(STDERR, "Invalid key\n");
    exit(1);
}

// Decode nonce hex
try {
    $nonceBytes = hex2bin($nonce);
    if ($nonceBytes === false || strlen($nonceBytes) > 16) {
        throw new \Exception("Invalid nonce");
    }
} catch (\Exception $e) {
    fwrite(STDERR, "Invalid nonce\n");
    exit(1);
}

// Verbose mode
$verbose = isset($options['v']) || isset($options['verbose']);
if ($verbose) {
    fwrite(STDERR, "Key length: " . strlen($keyBytes) . " bytes\n");
    fwrite(STDERR, "Nonce length: " . strlen($nonceBytes) . " bytes\n");
    fwrite(STDERR, "Input file: " . ($file ?? 'STDIN') . "\n");
}

// Read input data
$inputData = '';
if ($file === '-') {
    // Read from STDIN
    if ($verbose) {
        fwrite(STDERR, "Reading from STDIN...\n");
    }
    $inputData = file_get_contents('php://stdin');
    if ($inputData === false) {
        fwrite(STDERR, "Error reading from STDIN\n");
        exit(1);
    }
} else {
    // Read from file
    if (!file_exists($file)) {
        fwrite(STDERR, "File not found: " . $file . "\n");
        exit(1);
    }
    if ($verbose) {
        fwrite(STDERR, "Reading from file: " . $file . "\n");
    }
    $inputData = file_get_contents($file);
    if ($inputData === false) {
        fwrite(STDERR, "Error reading file: " . $file . "\n");
        exit(1);
    }
}

// Process with Sosemanuk
try {
    if ($verbose) {
        fwrite(STDERR, "Initializing Sosemanuk cipher...\n");
    }
    
    $cipher = new Sosemanuk($keyBytes, $nonceBytes);
    
    if ($verbose) {
        fwrite(STDERR, "Processing " . strlen($inputData) . " bytes...\n");
    }
    
    // Não passa o segundo parâmetro, apenas recebe o retorno
    $output = $cipher->process($inputData);
    
    // Write output to STDOUT
    echo $output;
    
    if ($verbose) {
        fwrite(STDERR, "Done.\n");
    }
    
} catch (\Exception $e) {
    fwrite(STDERR, "Error: " . $e->getMessage() . "\n");
    exit(1);
}

exit(0);
?>
