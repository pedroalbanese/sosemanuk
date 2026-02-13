<?php

class Sosemanuk {
    // Tabelas ALPHA (completas do código Go)
    private static $alphaMulTable = [
        0x00000000, 0xE19FCF13, 0x6B973726, 0x8A08F835,
        0xD6876E4C, 0x3718A15F, 0xBD10596A, 0x5C8F9679,
        0x05A7DC98, 0xE438138B, 0x6E30EBBE, 0x8FAF24AD,
        0xD320B2D4, 0x32BF7DC7, 0xB8B785F2, 0x59284AE1,
        0x0AE71199, 0xEB78DE8A, 0x617026BF, 0x80EFE9AC,
        0xDC607FD5, 0x3DFFB0C6, 0xB7F748F3, 0x566887E0,
        0x0F40CD01, 0xEEDF0212, 0x64D7FA27, 0x85483534,
        0xD9C7A34D, 0x38586C5E, 0xB250946B, 0x53CF5B78,
        0x1467229B, 0xF5F8ED88, 0x7FF015BD, 0x9E6FDAAE,
        0xC2E04CD7, 0x237F83C4, 0xA9777BF1, 0x48E8B4E2,
        0x11C0FE03, 0xF05F3110, 0x7A57C925, 0x9BC80636,
        0xC747904F, 0x26D85F5C, 0xACD0A769, 0x4D4F687A,
        0x1E803302, 0xFF1FFC11, 0x75170424, 0x9488CB37,
        0xC8075D4E, 0x2998925D, 0xA3906A68, 0x420FA57B,
        0x1B27EF9A, 0xFAB82089, 0x70B0D8BC, 0x912F17AF,
        0xCDA081D6, 0x2C3F4EC5, 0xA637B6F0, 0x47A879E3,
        0x28CE449F, 0xC9518B8C, 0x435973B9, 0xA2C6BCAA,
        0xFE492AD3, 0x1FD6E5C0, 0x95DE1DF5, 0x7441D2E6,
        0x2D699807, 0xCCF65714, 0x46FEAF21, 0xA7616032,
        0xFBEEF64B, 0x1A713958, 0x9079C16D, 0x71E60E7E,
        0x22295506, 0xC3B69A15, 0x49BE6220, 0xA821AD33,
        0xF4AE3B4A, 0x1531F459, 0x9F390C6C, 0x7EA6C37F,
        0x278E899E, 0xC611468D, 0x4C19BEB8, 0xAD8671AB,
        0xF109E7D2, 0x109628C1, 0x9A9ED0F4, 0x7B011FE7,
        0x3CA96604, 0xDD36A917, 0x573E5122, 0xB6A19E31,
        0xEA2E0848, 0x0BB1C75B, 0x81B93F6E, 0x6026F07D,
        0x390EBA9C, 0xD891758F, 0x52998DBA, 0xB30642A9,
        0xEF89D4D0, 0x0E161BC3, 0x841EE3F6, 0x65812CE5,
        0x364E779D, 0xD7D1B88E, 0x5DD940BB, 0xBC468FA8,
        0xE0C919D1, 0x0156D6C2, 0x8B5E2EF7, 0x6AC1E1E4,
        0x33E9AB05, 0xD2766416, 0x587E9C23, 0xB9E15330,
        0xE56EC549, 0x04F10A5A, 0x8EF9F26F, 0x6F663D7C,
        0x50358897, 0xB1AA4784, 0x3BA2BFB1, 0xDA3D70A2,
        0x86B2E6DB, 0x672D29C8, 0xED25D1FD, 0x0CBA1EEE,
        0x5592540F, 0xB40D9B1C, 0x3E056329, 0xDF9AAC3A,
        0x83153A43, 0x628AF550, 0xE8820D65, 0x091DC276,
        0x5AD2990E, 0xBB4D561D, 0x3145AE28, 0xD0DA613B,
        0x8C55F742, 0x6DCA3851, 0xE7C2C064, 0x065D0F77,
        0x5F754596, 0xBEEA8A85, 0x34E272B0, 0xD57DBDA3,
        0x89F22BDA, 0x686DE4C9, 0xE2651CFC, 0x03FAD3EF,
        0x4452AA0C, 0xA5CD651F, 0x2FC59D2A, 0xCE5A5239,
        0x92D5C440, 0x734A0B53, 0xF942F366, 0x18DD3C75,
        0x41F57694, 0xA06AB987, 0x2A6241B2, 0xCBFD8EA1,
        0x977218D8, 0x76EDD7CB, 0xFCE52FFE, 0x1D7AE0ED,
        0x4EB5BB95, 0xAF2A7486, 0x25228CB3, 0xC4BD43A0,
        0x9832D5D9, 0x79AD1ACA, 0xF3A5E2FF, 0x123A2DEC,
        0x4B12670D, 0xAA8DA81E, 0x2085502B, 0xC11A9F38,
        0x9D950941, 0x7C0AC652, 0xF6023E67, 0x179DF174,
        0x78FBCC08, 0x9964031B, 0x136CFB2E, 0xF2F3343D,
        0xAE7CA244, 0x4FE36D57, 0xC5EB9562, 0x24745A71,
        0x7D5C1090, 0x9CC3DF83, 0x16CB27B6, 0xF754E8A5,
        0xABDB7EDC, 0x4A44B1CF, 0xC04C49FA, 0x21D386E9,
        0x721CDD91, 0x93831282, 0x198BEAB7, 0xF81425A4,
        0xA49BB3DD, 0x45047CCE, 0xCF0C84FB, 0x2E934BE8,
        0x77BB0109, 0x9624CE1A, 0x1C2C362F, 0xFDB3F93C,
        0xA13C6F45, 0x40A3A056, 0xCAAB5863, 0x2B349770,
        0x6C9CEE93, 0x8D032180, 0x070BD9B5, 0xE69416A6,
        0xBA1B80DF, 0x5B844FCC, 0xD18CB7F9, 0x301378EA,
        0x693B320B, 0x88A4FD18, 0x02AC052D, 0xE333CA3E,
        0xBFBC5C47, 0x5E239354, 0xD42B6B61, 0x35B4A472,
        0x667BFF0A, 0x87E43019, 0x0DECC82C, 0xEC73073F,
        0xB0FC9146, 0x51635E55, 0xDB6BA660, 0x3AF46973,
        0x63DC2392, 0x8243EC81, 0x084B14B4, 0xE9D4DBA7,
        0xB55B4DDE, 0x54C482CD, 0xDECC7AF8, 0x3F53B5EB,
    ];

    private static $alphaDivTable = [
        0x00000000, 0x180F40CD, 0x301E8033, 0x2811C0FE,
        0x603CA966, 0x7833E9AB, 0x50222955, 0x482D6998,
        0xC078FBCC, 0xD877BB01, 0xF0667BFF, 0xE8693B32,
        0xA04452AA, 0xB84B1267, 0x905AD299, 0x88559254,
        0x29F05F31, 0x31FF1FFC, 0x19EEDF02, 0x01E19FCF,
        0x49CCF657, 0x51C3B69A, 0x79D27664, 0x61DD36A9,
        0xE988A4FD, 0xF187E430, 0xD99624CE, 0xC1996403,
        0x89B40D9B, 0x91BB4D56, 0xB9AA8DA8, 0xA1A5CD65,
        0x5249BE62, 0x4A46FEAF, 0x62573E51, 0x7A587E9C,
        0x32751704, 0x2A7A57C9, 0x026B9737, 0x1A64D7FA,
        0x923145AE, 0x8A3E0563, 0xA22FC59D, 0xBA208550,
        0xF20DECC8, 0xEA02AC05, 0xC2136CFB, 0xDA1C2C36,
        0x7BB9E153, 0x63B6A19E, 0x4BA76160, 0x53A821AD,
        0x1B854835, 0x038A08F8, 0x2B9BC806, 0x339488CB,
        0xBBC11A9F, 0xA3CE5A52, 0x8BDF9AAC, 0x93D0DA61,
        0xDBFDB3F9, 0xC3F2F334, 0xEBE333CA, 0xF3EC7307,
        0xA492D5C4, 0xBC9D9509, 0x948C55F7, 0x8C83153A,
        0xC4AE7CA2, 0xDCA13C6F, 0xF4B0FC91, 0xECBFBC5C,
        0x64EA2E08, 0x7CE56EC5, 0x54F4AE3B, 0x4CFBEEF6,
        0x04D6876E, 0x1CD9C7A3, 0x34C8075D, 0x2CC74790,
        0x8D628AF5, 0x956DCA38, 0xBD7C0AC6, 0xA5734A0B,
        0xED5E2393, 0xF551635E, 0xDD40A3A0, 0xC54FE36D,
        0x4D1A7139, 0x551531F4, 0x7D04F10A, 0x650BB1C7,
        0x2D26D85F, 0x35299892, 0x1D38586C, 0x053718A1,
        0xF6DB6BA6, 0xEED42B6B, 0xC6C5EB95, 0xDECAAB58,
        0x96E7C2C0, 0x8EE8820D, 0xA6F942F3, 0xBEF6023E,
        0x36A3906A, 0x2EACD0A7, 0x06BD1059, 0x1EB25094,
        0x569F390C, 0x4E9079C1, 0x6681B93F, 0x7E8EF9F2,
        0xDF2B3497, 0xC724745A, 0xEF35B4A4, 0xF73AF469,
        0xBF179DF1, 0xA718DD3C, 0x8F091DC2, 0x97065D0F,
        0x1F53CF5B, 0x075C8F96, 0x2F4D4F68, 0x37420FA5,
        0x7F6F663D, 0x676026F0, 0x4F71E60E, 0x577EA6C3,
        0xE18D0321, 0xF98243EC, 0xD1938312, 0xC99CC3DF,
        0x81B1AA47, 0x99BEEA8A, 0xB1AF2A74, 0xA9A06AB9,
        0x21F5F8ED, 0x39FAB820, 0x11EB78DE, 0x09E43813,
        0x41C9518B, 0x59C61146, 0x71D7D1B8, 0x69D89175,
        0xC87D5C10, 0xD0721CDD, 0xF863DC23, 0xE06C9CEE,
        0xA841F576, 0xB04EB5BB, 0x985F7545, 0x80503588,
        0x0805A7DC, 0x100AE711, 0x381B27EF, 0x20146722,
        0x68390EBA, 0x70364E77, 0x58278E89, 0x4028CE44,
        0xB3C4BD43, 0xABCBFD8E, 0x83DA3D70, 0x9BD57DBD,
        0xD3F81425, 0xCBF754E8, 0xE3E69416, 0xFBE9D4DB,
        0x73BC468F, 0x6BB30642, 0x43A2C6BC, 0x5BAD8671,
        0x1380EFE9, 0x0B8FAF24, 0x239E6FDA, 0x3B912F17,
        0x9A34E272, 0x823BA2BF, 0xAA2A6241, 0xB225228C,
        0xFA084B14, 0xE2070BD9, 0xCA16CB27, 0xD2198BEA,
        0x5A4C19BE, 0x42435973, 0x6A52998D, 0x725DD940,
        0x3A70B0D8, 0x227FF015, 0x0A6E30EB, 0x12617026,
        0x451FD6E5, 0x5D109628, 0x750156D6, 0x6D0E161B,
        0x25237F83, 0x3D2C3F4E, 0x153DFFB0, 0x0D32BF7D,
        0x85672D29, 0x9D686DE4, 0xB579AD1A, 0xAD76EDD7,
        0xE55B844F, 0xFD54C482, 0xD545047C, 0xCD4A44B1,
        0x6CEF89D4, 0x74E0C919, 0x5CF109E7, 0x44FE492A,
        0x0CD320B2, 0x14DC607F, 0x3CCDA081, 0x24C2E04C,
        0xAC977218, 0xB49832D5, 0x9C89F22B, 0x8486B2E6,
        0xCCABDB7E, 0xD4A49BB3, 0xFCB55B4D, 0xE4BA1B80,
        0x17566887, 0x0F59284A, 0x2748E8B4, 0x3F47A879,
        0x776AC1E1, 0x6F65812C, 0x477441D2, 0x5F7B011F,
        0xD72E934B, 0xCF21D386, 0xE7301378, 0xFF3F53B5,
        0xB7123A2D, 0xAF1D7AE0, 0x870CBA1E, 0x9F03FAD3,
        0x3EA637B6, 0x26A9777B, 0x0EB8B785, 0x16B7F748,
        0x5E9A9ED0, 0x4695DE1D, 0x6E841EE3, 0x768B5E2E,
        0xFEDECC7A, 0xE6D18CB7, 0xCEC04C49, 0xD6CF0C84,
        0x9EE2651C, 0x86ED25D1, 0xAEFCE52F, 0xB6F3A5E2,
    ];

    private $lfsr;
    private $fsmR;
    private $subkeys;
    private $output;
    private $offset;

    public function __construct($key, $nonce) {
        if (strlen($key) > 32) {
            throw new InvalidArgumentException("sosemanuk: key length must be <= 32 bytes");
        }
        if (strlen($nonce) > 16) {
            throw new InvalidArgumentException("sosemanuk: nonce length must be <= 16 bytes");
        }

        $this->lfsr = array_fill(0, 10, 0);
        $this->fsmR = array_fill(0, 2, 0);
        $this->subkeys = array_fill(0, 100, 0);
        $this->output = array_fill(0, 80, 0);
        $this->offset = 80;

        $this->keySetup($key);
        $this->ivSetup($nonce);
    }

    private function rotl32($x, $n) {
        return (($x << $n) | (($x >> (32 - $n)) & ((1 << $n) - 1))) & 0xFFFFFFFF;
    }

    private function shl32($x, $n) {
        return ($x << $n) & 0xFFFFFFFF;
    }

    private function le32($bytes, $offset) {
        return $bytes[$offset] | 
               ($bytes[$offset + 1] << 8) | 
               ($bytes[$offset + 2] << 16) | 
               ($bytes[$offset + 3] << 24);
    }

    private function writeU32vLe(&$dst, $src, $offset) {
        for ($i = 0; $i < count($src); $i++) {
            $v = $src[$i];
            $idx = $offset + ($i * 4);
            $dst[$idx] = ($v & 0xFF);
            $dst[$idx + 1] = (($v >> 8) & 0xFF);
            $dst[$idx + 2] = (($v >> 16) & 0xFF);
            $dst[$idx + 3] = (($v >> 24) & 0xFF);
        }
    }

    private function keySetup($key) {
        $fullKey = array_fill(0, 32, 0);
        $keyLen = strlen($key);
        $keyBytes = array_values(unpack('C*', $key));
        
        for ($i = 0; $i < $keyLen && $i < 32; $i++) {
            $fullKey[$i] = $keyBytes[$i];
        }
        if ($keyLen < 32) {
            $fullKey[$keyLen] = 0x01;
        }

        $w0 = $this->le32($fullKey, 0);
        $w1 = $this->le32($fullKey, 4);
        $w2 = $this->le32($fullKey, 8);
        $w3 = $this->le32($fullKey, 12);
        $w4 = $this->le32($fullKey, 16);
        $w5 = $this->le32($fullKey, 20);
        $w6 = $this->le32($fullKey, 24);
        $w7 = $this->le32($fullKey, 28);
        
        $i = 0;

        // === ROUND 0 ===
        $tt = $w0 ^ $w3 ^ $w5 ^ $w7 ^ (0x9E3779B9 ^ 0);
        $w0 = $this->rotl32($tt, 11);
        $tt = $w1 ^ $w4 ^ $w6 ^ $w0 ^ (0x9E3779B9 ^ 1);
        $w1 = $this->rotl32($tt, 11);
        $tt = $w2 ^ $w5 ^ $w7 ^ $w1 ^ (0x9E3779B9 ^ 2);
        $w2 = $this->rotl32($tt, 11);
        $tt = $w3 ^ $w6 ^ $w0 ^ $w2 ^ (0x9E3779B9 ^ 3);
        $w3 = $this->rotl32($tt, 11);
        
        $r0 = $w0;
        $r1 = $w1;
        $r2 = $w2;
        $r3 = $w3;
        $r4 = $r0;
        $r0 |= $r3;
        $r3 ^= $r1;
        $r1 &= $r4;
        $r4 ^= $r2;
        $r2 ^= $r3;
        $r3 &= $r0;
        $r4 |= $r1;
        $r3 ^= $r4;
        $r0 ^= $r1;
        $r4 &= $r0;
        $r1 ^= $r3;
        $r4 ^= $r2;
        $r1 |= $r0;
        $r1 ^= $r2;
        $r0 ^= $r3;
        $r2 = $r1;
        $r1 |= $r3;
        $r1 ^= $r0;
        
        $this->subkeys[$i++] = $r1 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r2 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r3 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r4 & 0xFFFFFFFF;

        // === ROUND 4 ===
        $tt = $w4 ^ $w7 ^ $w1 ^ $w3 ^ (0x9E3779B9 ^ 4);
        $w4 = $this->rotl32($tt, 11);
        $tt = $w5 ^ $w0 ^ $w2 ^ $w4 ^ (0x9E3779B9 ^ 5);
        $w5 = $this->rotl32($tt, 11);
        $tt = $w6 ^ $w1 ^ $w3 ^ $w5 ^ (0x9E3779B9 ^ 6);
        $w6 = $this->rotl32($tt, 11);
        $tt = $w7 ^ $w2 ^ $w4 ^ $w6 ^ (0x9E3779B9 ^ 7);
        $w7 = $this->rotl32($tt, 11);
        
        $r0 = $w4;
        $r1 = $w5;
        $r2 = $w6;
        $r3 = $w7;
        $r4 = $r0;
        $r0 &= $r2;
        $r0 ^= $r3;
        $r2 ^= $r1;
        $r2 ^= $r0;
        $r3 |= $r4;
        $r3 ^= $r1;
        $r4 ^= $r2;
        $r1 = $r3;
        $r3 |= $r4;
        $r3 ^= $r0;
        $r0 &= $r1;
        $r4 ^= $r0;
        $r1 ^= $r3;
        $r1 ^= $r4;
        $r4 = (~$r4) & 0xFFFFFFFF;
        
        $this->subkeys[$i++] = $r2 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r3 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r1 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r4 & 0xFFFFFFFF;

        // === ROUND 8 ===
        $tt = $w0 ^ $w3 ^ $w5 ^ $w7 ^ (0x9E3779B9 ^ 8);
        $w0 = $this->rotl32($tt, 11);
        $tt = $w1 ^ $w4 ^ $w6 ^ $w0 ^ (0x9E3779B9 ^ 9);
        $w1 = $this->rotl32($tt, 11);
        $tt = $w2 ^ $w5 ^ $w7 ^ $w1 ^ (0x9E3779B9 ^ 10);
        $w2 = $this->rotl32($tt, 11);
        $tt = $w3 ^ $w6 ^ $w0 ^ $w2 ^ (0x9E3779B9 ^ 11);
        $w3 = $this->rotl32($tt, 11);
        
        $r0 = $w0;
        $r1 = $w1;
        $r2 = $w2;
        $r3 = $w3;
        $r0 = (~$r0) & 0xFFFFFFFF;
        $r2 = (~$r2) & 0xFFFFFFFF;
        $r4 = $r0;
        $r0 &= $r1;
        $r2 ^= $r0;
        $r0 |= $r3;
        $r3 ^= $r2;
        $r1 ^= $r0;
        $r0 ^= $r4;
        $r4 |= $r1;
        $r1 ^= $r3;
        $r2 |= $r0;
        $r2 &= $r4;
        $r0 ^= $r1;
        $r1 &= $r2;
        $r1 ^= $r0;
        $r0 &= $r2;
        $r0 ^= $r4;
        
        $this->subkeys[$i++] = $r2 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r0 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r3 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r1 & 0xFFFFFFFF;

        // === ROUND 12 ===
        $tt = $w4 ^ $w7 ^ $w1 ^ $w3 ^ (0x9E3779B9 ^ 12);
        $w4 = $this->rotl32($tt, 11);
        $tt = $w5 ^ $w0 ^ $w2 ^ $w4 ^ (0x9E3779B9 ^ 13);
        $w5 = $this->rotl32($tt, 11);
        $tt = $w6 ^ $w1 ^ $w3 ^ $w5 ^ (0x9E3779B9 ^ 14);
        $w6 = $this->rotl32($tt, 11);
        $tt = $w7 ^ $w2 ^ $w4 ^ $w6 ^ (0x9E3779B9 ^ 15);
        $w7 = $this->rotl32($tt, 11);
        
        $r0 = $w4;
        $r1 = $w5;
        $r2 = $w6;
        $r3 = $w7;
        $r3 ^= $r0;
        $r4 = $r1;
        $r1 &= $r3;
        $r4 ^= $r2;
        $r1 ^= $r0;
        $r0 |= $r3;
        $r0 ^= $r4;
        $r4 ^= $r3;
        $r3 ^= $r2;
        $r2 |= $r1;
        $r2 ^= $r4;
        $r4 = (~$r4) & 0xFFFFFFFF;
        $r4 |= $r1;
        $r1 ^= $r3;
        $r1 ^= $r4;
        $r3 |= $r0;
        $r1 ^= $r3;
        $r4 ^= $r3;
        
        $this->subkeys[$i++] = $r1 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r4 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r2 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r0 & 0xFFFFFFFF;

        // === ROUND 16 ===
        $tt = $w0 ^ $w3 ^ $w5 ^ $w7 ^ (0x9E3779B9 ^ 16);
        $w0 = $this->rotl32($tt, 11);
        $tt = $w1 ^ $w4 ^ $w6 ^ $w0 ^ (0x9E3779B9 ^ 17);
        $w1 = $this->rotl32($tt, 11);
        $tt = $w2 ^ $w5 ^ $w7 ^ $w1 ^ (0x9E3779B9 ^ 18);
        $w2 = $this->rotl32($tt, 11);
        $tt = $w3 ^ $w6 ^ $w0 ^ $w2 ^ (0x9E3779B9 ^ 19);
        $w3 = $this->rotl32($tt, 11);
        
        $r0 = $w0;
        $r1 = $w1;
        $r2 = $w2;
        $r3 = $w3;
        $r4 = $r1;
        $r1 |= $r2;
        $r1 ^= $r3;
        $r4 ^= $r2;
        $r2 ^= $r1;
        $r3 |= $r4;
        $r3 &= $r0;
        $r4 ^= $r2;
        $r3 ^= $r1;
        $r1 |= $r4;
        $r1 ^= $r0;
        $r0 |= $r4;
        $r0 ^= $r2;
        $r1 ^= $r4;
        $r2 ^= $r1;
        $r1 &= $r0;
        $r1 ^= $r4;
        $r2 = (~$r2) & 0xFFFFFFFF;
        $r2 |= $r0;
        $r4 ^= $r2;
        
        $this->subkeys[$i++] = $r4 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r3 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r1 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r0 & 0xFFFFFFFF;

        // === ROUND 20 ===
        $tt = $w4 ^ $w7 ^ $w1 ^ $w3 ^ (0x9E3779B9 ^ 20);
        $w4 = $this->rotl32($tt, 11);
        $tt = $w5 ^ $w0 ^ $w2 ^ $w4 ^ (0x9E3779B9 ^ 21);
        $w5 = $this->rotl32($tt, 11);
        $tt = $w6 ^ $w1 ^ $w3 ^ $w5 ^ (0x9E3779B9 ^ 22);
        $w6 = $this->rotl32($tt, 11);
        $tt = $w7 ^ $w2 ^ $w4 ^ $w6 ^ (0x9E3779B9 ^ 23);
        $w7 = $this->rotl32($tt, 11);
        
        $r0 = $w4;
        $r1 = $w5;
        $r2 = $w6;
        $r3 = $w7;
        $r2 = (~$r2) & 0xFFFFFFFF;
        $r4 = $r3;
        $r3 &= $r0;
        $r0 ^= $r4;
        $r3 ^= $r2;
        $r2 |= $r4;
        $r1 ^= $r3;
        $r2 ^= $r0;
        $r0 |= $r1;
        $r2 ^= $r1;
        $r4 ^= $r0;
        $r0 |= $r3;
        $r0 ^= $r2;
        $r4 ^= $r3;
        $r4 ^= $r0;
        $r3 = (~$r3) & 0xFFFFFFFF;
        $r2 &= $r4;
        $r2 ^= $r3;
        
        $this->subkeys[$i++] = $r0 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r1 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r4 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r2 & 0xFFFFFFFF;

        // === ROUND 24 ===
        $tt = $w0 ^ $w3 ^ $w5 ^ $w7 ^ (0x9E3779B9 ^ 24);
        $w0 = $this->rotl32($tt, 11);
        $tt = $w1 ^ $w4 ^ $w6 ^ $w0 ^ (0x9E3779B9 ^ 25);
        $w1 = $this->rotl32($tt, 11);
        $tt = $w2 ^ $w5 ^ $w7 ^ $w1 ^ (0x9E3779B9 ^ 26);
        $w2 = $this->rotl32($tt, 11);
        $tt = $w3 ^ $w6 ^ $w0 ^ $w2 ^ (0x9E3779B9 ^ 27);
        $w3 = $this->rotl32($tt, 11);
        
        $r0 = $w0;
        $r1 = $w1;
        $r2 = $w2;
        $r3 = $w3;
        $r0 ^= $r1;
        $r1 ^= $r3;
        $r3 = (~$r3) & 0xFFFFFFFF;
        $r4 = $r1;
        $r1 &= $r0;
        $r2 ^= $r3;
        $r1 ^= $r2;
        $r2 |= $r4;
        $r4 ^= $r3;
        $r3 &= $r1;
        $r3 ^= $r0;
        $r4 ^= $r1;
        $r4 ^= $r2;
        $r2 ^= $r0;
        $r0 &= $r3;
        $r2 = (~$r2) & 0xFFFFFFFF;
        $r0 ^= $r4;
        $r4 |= $r3;
        $r2 ^= $r4;
        
        $this->subkeys[$i++] = $r1 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r3 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r0 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r2 & 0xFFFFFFFF;

        // === ROUND 28 ===
        $tt = $w4 ^ $w7 ^ $w1 ^ $w3 ^ (0x9E3779B9 ^ 28);
        $w4 = $this->rotl32($tt, 11);
        $tt = $w5 ^ $w0 ^ $w2 ^ $w4 ^ (0x9E3779B9 ^ 29);
        $w5 = $this->rotl32($tt, 11);
        $tt = $w6 ^ $w1 ^ $w3 ^ $w5 ^ (0x9E3779B9 ^ 30);
        $w6 = $this->rotl32($tt, 11);
        $tt = $w7 ^ $w2 ^ $w4 ^ $w6 ^ (0x9E3779B9 ^ 31);
        $w7 = $this->rotl32($tt, 11);
        
        $r0 = $w4;
        $r1 = $w5;
        $r2 = $w6;
        $r3 = $w7;
        $r1 ^= $r3;
        $r3 = (~$r3) & 0xFFFFFFFF;
        $r2 ^= $r3;
        $r3 ^= $r0;
        $r4 = $r1;
        $r1 &= $r3;
        $r1 ^= $r2;
        $r4 ^= $r3;
        $r0 ^= $r4;
        $r2 &= $r4;
        $r2 ^= $r0;
        $r0 &= $r1;
        $r3 ^= $r0;
        $r4 |= $r1;
        $r4 ^= $r0;
        $r0 |= $r3;
        $r0 ^= $r2;
        $r2 &= $r3;
        $r0 = (~$r0) & 0xFFFFFFFF;
        $r4 ^= $r2;
        
        $this->subkeys[$i++] = $r1 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r4 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r0 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r3 & 0xFFFFFFFF;

        // === ROUND 32 ===
        $tt = $w0 ^ $w3 ^ $w5 ^ $w7 ^ (0x9E3779B9 ^ 32);
        $w0 = $this->rotl32($tt, 11);
        $tt = $w1 ^ $w4 ^ $w6 ^ $w0 ^ (0x9E3779B9 ^ 33);
        $w1 = $this->rotl32($tt, 11);
        $tt = $w2 ^ $w5 ^ $w7 ^ $w1 ^ (0x9E3779B9 ^ 34);
        $w2 = $this->rotl32($tt, 11);
        $tt = $w3 ^ $w6 ^ $w0 ^ $w2 ^ (0x9E3779B9 ^ 35);
        $w3 = $this->rotl32($tt, 11);
        
        $r0 = $w0;
        $r1 = $w1;
        $r2 = $w2;
        $r3 = $w3;
        $r4 = $r0;
        $r0 |= $r3;
        $r3 ^= $r1;
        $r1 &= $r4;
        $r4 ^= $r2;
        $r2 ^= $r3;
        $r3 &= $r0;
        $r4 |= $r1;
        $r3 ^= $r4;
        $r0 ^= $r1;
        $r4 &= $r0;
        $r1 ^= $r3;
        $r4 ^= $r2;
        $r1 |= $r0;
        $r1 ^= $r2;
        $r0 ^= $r3;
        $r2 = $r1;
        $r1 |= $r3;
        $r1 ^= $r0;
        
        $this->subkeys[$i++] = $r1 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r2 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r3 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r4 & 0xFFFFFFFF;

        // === ROUND 36 ===
        $tt = $w4 ^ $w7 ^ $w1 ^ $w3 ^ (0x9E3779B9 ^ 36);
        $w4 = $this->rotl32($tt, 11);
        $tt = $w5 ^ $w0 ^ $w2 ^ $w4 ^ (0x9E3779B9 ^ 37);
        $w5 = $this->rotl32($tt, 11);
        $tt = $w6 ^ $w1 ^ $w3 ^ $w5 ^ (0x9E3779B9 ^ 38);
        $w6 = $this->rotl32($tt, 11);
        $tt = $w7 ^ $w2 ^ $w4 ^ $w6 ^ (0x9E3779B9 ^ 39);
        $w7 = $this->rotl32($tt, 11);
        
        $r0 = $w4;
        $r1 = $w5;
        $r2 = $w6;
        $r3 = $w7;
        $r4 = $r0;
        $r0 &= $r2;
        $r0 ^= $r3;
        $r2 ^= $r1;
        $r2 ^= $r0;
        $r3 |= $r4;
        $r3 ^= $r1;
        $r4 ^= $r2;
        $r1 = $r3;
        $r3 |= $r4;
        $r3 ^= $r0;
        $r0 &= $r1;
        $r4 ^= $r0;
        $r1 ^= $r3;
        $r1 ^= $r4;
        $r4 = (~$r4) & 0xFFFFFFFF;
        
        $this->subkeys[$i++] = $r2 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r3 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r1 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r4 & 0xFFFFFFFF;

        // === ROUND 40 ===
        $tt = $w0 ^ $w3 ^ $w5 ^ $w7 ^ (0x9E3779B9 ^ 40);
        $w0 = $this->rotl32($tt, 11);
        $tt = $w1 ^ $w4 ^ $w6 ^ $w0 ^ (0x9E3779B9 ^ 41);
        $w1 = $this->rotl32($tt, 11);
        $tt = $w2 ^ $w5 ^ $w7 ^ $w1 ^ (0x9E3779B9 ^ 42);
        $w2 = $this->rotl32($tt, 11);
        $tt = $w3 ^ $w6 ^ $w0 ^ $w2 ^ (0x9E3779B9 ^ 43);
        $w3 = $this->rotl32($tt, 11);
        
        $r0 = $w0;
        $r1 = $w1;
        $r2 = $w2;
        $r3 = $w3;
        $r0 = (~$r0) & 0xFFFFFFFF;
        $r2 = (~$r2) & 0xFFFFFFFF;
        $r4 = $r0;
        $r0 &= $r1;
        $r2 ^= $r0;
        $r0 |= $r3;
        $r3 ^= $r2;
        $r1 ^= $r0;
        $r0 ^= $r4;
        $r4 |= $r1;
        $r1 ^= $r3;
        $r2 |= $r0;
        $r2 &= $r4;
        $r0 ^= $r1;
        $r1 &= $r2;
        $r1 ^= $r0;
        $r0 &= $r2;
        $r0 ^= $r4;
        
        $this->subkeys[$i++] = $r2 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r0 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r3 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r1 & 0xFFFFFFFF;

        // === ROUND 44 ===
        $tt = $w4 ^ $w7 ^ $w1 ^ $w3 ^ (0x9E3779B9 ^ 44);
        $w4 = $this->rotl32($tt, 11);
        $tt = $w5 ^ $w0 ^ $w2 ^ $w4 ^ (0x9E3779B9 ^ 45);
        $w5 = $this->rotl32($tt, 11);
        $tt = $w6 ^ $w1 ^ $w3 ^ $w5 ^ (0x9E3779B9 ^ 46);
        $w6 = $this->rotl32($tt, 11);
        $tt = $w7 ^ $w2 ^ $w4 ^ $w6 ^ (0x9E3779B9 ^ 47);
        $w7 = $this->rotl32($tt, 11);
        
        $r0 = $w4;
        $r1 = $w5;
        $r2 = $w6;
        $r3 = $w7;
        $r3 ^= $r0;
        $r4 = $r1;
        $r1 &= $r3;
        $r4 ^= $r2;
        $r1 ^= $r0;
        $r0 |= $r3;
        $r0 ^= $r4;
        $r4 ^= $r3;
        $r3 ^= $r2;
        $r2 |= $r1;
        $r2 ^= $r4;
        $r4 = (~$r4) & 0xFFFFFFFF;
        $r4 |= $r1;
        $r1 ^= $r3;
        $r1 ^= $r4;
        $r3 |= $r0;
        $r1 ^= $r3;
        $r4 ^= $r3;
        
        $this->subkeys[$i++] = $r1 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r4 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r2 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r0 & 0xFFFFFFFF;

        // === ROUND 48 ===
        $tt = $w0 ^ $w3 ^ $w5 ^ $w7 ^ (0x9E3779B9 ^ 48);
        $w0 = $this->rotl32($tt, 11);
        $tt = $w1 ^ $w4 ^ $w6 ^ $w0 ^ (0x9E3779B9 ^ 49);
        $w1 = $this->rotl32($tt, 11);
        $tt = $w2 ^ $w5 ^ $w7 ^ $w1 ^ (0x9E3779B9 ^ 50);
        $w2 = $this->rotl32($tt, 11);
        $tt = $w3 ^ $w6 ^ $w0 ^ $w2 ^ (0x9E3779B9 ^ 51);
        $w3 = $this->rotl32($tt, 11);
        
        $r0 = $w0;
        $r1 = $w1;
        $r2 = $w2;
        $r3 = $w3;
        $r4 = $r1;
        $r1 |= $r2;
        $r1 ^= $r3;
        $r4 ^= $r2;
        $r2 ^= $r1;
        $r3 |= $r4;
        $r3 &= $r0;
        $r4 ^= $r2;
        $r3 ^= $r1;
        $r1 |= $r4;
        $r1 ^= $r0;
        $r0 |= $r4;
        $r0 ^= $r2;
        $r1 ^= $r4;
        $r2 ^= $r1;
        $r1 &= $r0;
        $r1 ^= $r4;
        $r2 = (~$r2) & 0xFFFFFFFF;
        $r2 |= $r0;
        $r4 ^= $r2;
        
        $this->subkeys[$i++] = $r4 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r3 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r1 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r0 & 0xFFFFFFFF;

        // === ROUND 52 ===
        $tt = $w4 ^ $w7 ^ $w1 ^ $w3 ^ (0x9E3779B9 ^ 52);
        $w4 = $this->rotl32($tt, 11);
        $tt = $w5 ^ $w0 ^ $w2 ^ $w4 ^ (0x9E3779B9 ^ 53);
        $w5 = $this->rotl32($tt, 11);
        $tt = $w6 ^ $w1 ^ $w3 ^ $w5 ^ (0x9E3779B9 ^ 54);
        $w6 = $this->rotl32($tt, 11);
        $tt = $w7 ^ $w2 ^ $w4 ^ $w6 ^ (0x9E3779B9 ^ 55);
        $w7 = $this->rotl32($tt, 11);
        
        $r0 = $w4;
        $r1 = $w5;
        $r2 = $w6;
        $r3 = $w7;
        $r2 = (~$r2) & 0xFFFFFFFF;
        $r4 = $r3;
        $r3 &= $r0;
        $r0 ^= $r4;
        $r3 ^= $r2;
        $r2 |= $r4;
        $r1 ^= $r3;
        $r2 ^= $r0;
        $r0 |= $r1;
        $r2 ^= $r1;
        $r4 ^= $r0;
        $r0 |= $r3;
        $r0 ^= $r2;
        $r4 ^= $r3;
        $r4 ^= $r0;
        $r3 = (~$r3) & 0xFFFFFFFF;
        $r2 &= $r4;
        $r2 ^= $r3;
        
        $this->subkeys[$i++] = $r0 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r1 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r4 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r2 & 0xFFFFFFFF;

        // === ROUND 56 ===
        $tt = $w0 ^ $w3 ^ $w5 ^ $w7 ^ (0x9E3779B9 ^ 56);
        $w0 = $this->rotl32($tt, 11);
        $tt = $w1 ^ $w4 ^ $w6 ^ $w0 ^ (0x9E3779B9 ^ 57);
        $w1 = $this->rotl32($tt, 11);
        $tt = $w2 ^ $w5 ^ $w7 ^ $w1 ^ (0x9E3779B9 ^ 58);
        $w2 = $this->rotl32($tt, 11);
        $tt = $w3 ^ $w6 ^ $w0 ^ $w2 ^ (0x9E3779B9 ^ 59);
        $w3 = $this->rotl32($tt, 11);
        
        $r0 = $w0;
        $r1 = $w1;
        $r2 = $w2;
        $r3 = $w3;
        $r0 ^= $r1;
        $r1 ^= $r3;
        $r3 = (~$r3) & 0xFFFFFFFF;
        $r4 = $r1;
        $r1 &= $r0;
        $r2 ^= $r3;
        $r1 ^= $r2;
        $r2 |= $r4;
        $r4 ^= $r3;
        $r3 &= $r1;
        $r3 ^= $r0;
        $r4 ^= $r1;
        $r4 ^= $r2;
        $r2 ^= $r0;
        $r0 &= $r3;
        $r2 = (~$r2) & 0xFFFFFFFF;
        $r0 ^= $r4;
        $r4 |= $r3;
        $r2 ^= $r4;
        
        $this->subkeys[$i++] = $r1 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r3 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r0 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r2 & 0xFFFFFFFF;

        // === ROUND 60 ===
        $tt = $w4 ^ $w7 ^ $w1 ^ $w3 ^ (0x9E3779B9 ^ 60);
        $w4 = $this->rotl32($tt, 11);
        $tt = $w5 ^ $w0 ^ $w2 ^ $w4 ^ (0x9E3779B9 ^ 61);
        $w5 = $this->rotl32($tt, 11);
        $tt = $w6 ^ $w1 ^ $w3 ^ $w5 ^ (0x9E3779B9 ^ 62);
        $w6 = $this->rotl32($tt, 11);
        $tt = $w7 ^ $w2 ^ $w4 ^ $w6 ^ (0x9E3779B9 ^ 63);
        $w7 = $this->rotl32($tt, 11);
        
        $r0 = $w4;
        $r1 = $w5;
        $r2 = $w6;
        $r3 = $w7;
        $r1 ^= $r3;
        $r3 = (~$r3) & 0xFFFFFFFF;
        $r2 ^= $r3;
        $r3 ^= $r0;
        $r4 = $r1;
        $r1 &= $r3;
        $r1 ^= $r2;
        $r4 ^= $r3;
        $r0 ^= $r4;
        $r2 &= $r4;
        $r2 ^= $r0;
        $r0 &= $r1;
        $r3 ^= $r0;
        $r4 |= $r1;
        $r4 ^= $r0;
        $r0 |= $r3;
        $r0 ^= $r2;
        $r2 &= $r3;
        $r0 = (~$r0) & 0xFFFFFFFF;
        $r4 ^= $r2;
        
        $this->subkeys[$i++] = $r1 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r4 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r0 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r3 & 0xFFFFFFFF;

        // === ROUND 64 ===
        $tt = $w0 ^ $w3 ^ $w5 ^ $w7 ^ (0x9E3779B9 ^ 64);
        $w0 = $this->rotl32($tt, 11);
        $tt = $w1 ^ $w4 ^ $w6 ^ $w0 ^ (0x9E3779B9 ^ 65);
        $w1 = $this->rotl32($tt, 11);
        $tt = $w2 ^ $w5 ^ $w7 ^ $w1 ^ (0x9E3779B9 ^ 66);
        $w2 = $this->rotl32($tt, 11);
        $tt = $w3 ^ $w6 ^ $w0 ^ $w2 ^ (0x9E3779B9 ^ 67);
        $w3 = $this->rotl32($tt, 11);
        
        $r0 = $w0;
        $r1 = $w1;
        $r2 = $w2;
        $r3 = $w3;
        $r4 = $r0;
        $r0 |= $r3;
        $r3 ^= $r1;
        $r1 &= $r4;
        $r4 ^= $r2;
        $r2 ^= $r3;
        $r3 &= $r0;
        $r4 |= $r1;
        $r3 ^= $r4;
        $r0 ^= $r1;
        $r4 &= $r0;
        $r1 ^= $r3;
        $r4 ^= $r2;
        $r1 |= $r0;
        $r1 ^= $r2;
        $r0 ^= $r3;
        $r2 = $r1;
        $r1 |= $r3;
        $r1 ^= $r0;
        
        $this->subkeys[$i++] = $r1 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r2 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r3 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r4 & 0xFFFFFFFF;

        // === ROUND 68 ===
        $tt = $w4 ^ $w7 ^ $w1 ^ $w3 ^ (0x9E3779B9 ^ 68);
        $w4 = $this->rotl32($tt, 11);
        $tt = $w5 ^ $w0 ^ $w2 ^ $w4 ^ (0x9E3779B9 ^ 69);
        $w5 = $this->rotl32($tt, 11);
        $tt = $w6 ^ $w1 ^ $w3 ^ $w5 ^ (0x9E3779B9 ^ 70);
        $w6 = $this->rotl32($tt, 11);
        $tt = $w7 ^ $w2 ^ $w4 ^ $w6 ^ (0x9E3779B9 ^ 71);
        $w7 = $this->rotl32($tt, 11);
        
        $r0 = $w4;
        $r1 = $w5;
        $r2 = $w6;
        $r3 = $w7;
        $r4 = $r0;
        $r0 &= $r2;
        $r0 ^= $r3;
        $r2 ^= $r1;
        $r2 ^= $r0;
        $r3 |= $r4;
        $r3 ^= $r1;
        $r4 ^= $r2;
        $r1 = $r3;
        $r3 |= $r4;
        $r3 ^= $r0;
        $r0 &= $r1;
        $r4 ^= $r0;
        $r1 ^= $r3;
        $r1 ^= $r4;
        $r4 = (~$r4) & 0xFFFFFFFF;
        
        $this->subkeys[$i++] = $r2 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r3 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r1 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r4 & 0xFFFFFFFF;

        // === ROUND 72 ===
        $tt = $w0 ^ $w3 ^ $w5 ^ $w7 ^ (0x9E3779B9 ^ 72);
        $w0 = $this->rotl32($tt, 11);
        $tt = $w1 ^ $w4 ^ $w6 ^ $w0 ^ (0x9E3779B9 ^ 73);
        $w1 = $this->rotl32($tt, 11);
        $tt = $w2 ^ $w5 ^ $w7 ^ $w1 ^ (0x9E3779B9 ^ 74);
        $w2 = $this->rotl32($tt, 11);
        $tt = $w3 ^ $w6 ^ $w0 ^ $w2 ^ (0x9E3779B9 ^ 75);
        $w3 = $this->rotl32($tt, 11);
        
        $r0 = $w0;
        $r1 = $w1;
        $r2 = $w2;
        $r3 = $w3;
        $r0 = (~$r0) & 0xFFFFFFFF;
        $r2 = (~$r2) & 0xFFFFFFFF;
        $r4 = $r0;
        $r0 &= $r1;
        $r2 ^= $r0;
        $r0 |= $r3;
        $r3 ^= $r2;
        $r1 ^= $r0;
        $r0 ^= $r4;
        $r4 |= $r1;
        $r1 ^= $r3;
        $r2 |= $r0;
        $r2 &= $r4;
        $r0 ^= $r1;
        $r1 &= $r2;
        $r1 ^= $r0;
        $r0 &= $r2;
        $r0 ^= $r4;
        
        $this->subkeys[$i++] = $r2 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r0 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r3 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r1 & 0xFFFFFFFF;

        // === ROUND 76 ===
        $tt = $w4 ^ $w7 ^ $w1 ^ $w3 ^ (0x9E3779B9 ^ 76);
        $w4 = $this->rotl32($tt, 11);
        $tt = $w5 ^ $w0 ^ $w2 ^ $w4 ^ (0x9E3779B9 ^ 77);
        $w5 = $this->rotl32($tt, 11);
        $tt = $w6 ^ $w1 ^ $w3 ^ $w5 ^ (0x9E3779B9 ^ 78);
        $w6 = $this->rotl32($tt, 11);
        $tt = $w7 ^ $w2 ^ $w4 ^ $w6 ^ (0x9E3779B9 ^ 79);
        $w7 = $this->rotl32($tt, 11);
        
        $r0 = $w4;
        $r1 = $w5;
        $r2 = $w6;
        $r3 = $w7;
        $r3 ^= $r0;
        $r4 = $r1;
        $r1 &= $r3;
        $r4 ^= $r2;
        $r1 ^= $r0;
        $r0 |= $r3;
        $r0 ^= $r4;
        $r4 ^= $r3;
        $r3 ^= $r2;
        $r2 |= $r1;
        $r2 ^= $r4;
        $r4 = (~$r4) & 0xFFFFFFFF;
        $r4 |= $r1;
        $r1 ^= $r3;
        $r1 ^= $r4;
        $r3 |= $r0;
        $r1 ^= $r3;
        $r4 ^= $r3;
        
        $this->subkeys[$i++] = $r1 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r4 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r2 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r0 & 0xFFFFFFFF;

        // === ROUND 80 ===
        $tt = $w0 ^ $w3 ^ $w5 ^ $w7 ^ (0x9E3779B9 ^ 80);
        $w0 = $this->rotl32($tt, 11);
        $tt = $w1 ^ $w4 ^ $w6 ^ $w0 ^ (0x9E3779B9 ^ 81);
        $w1 = $this->rotl32($tt, 11);
        $tt = $w2 ^ $w5 ^ $w7 ^ $w1 ^ (0x9E3779B9 ^ 82);
        $w2 = $this->rotl32($tt, 11);
        $tt = $w3 ^ $w6 ^ $w0 ^ $w2 ^ (0x9E3779B9 ^ 83);
        $w3 = $this->rotl32($tt, 11);
        
        $r0 = $w0;
        $r1 = $w1;
        $r2 = $w2;
        $r3 = $w3;
        $r4 = $r1;
        $r1 |= $r2;
        $r1 ^= $r3;
        $r4 ^= $r2;
        $r2 ^= $r1;
        $r3 |= $r4;
        $r3 &= $r0;
        $r4 ^= $r2;
        $r3 ^= $r1;
        $r1 |= $r4;
        $r1 ^= $r0;
        $r0 |= $r4;
        $r0 ^= $r2;
        $r1 ^= $r4;
        $r2 ^= $r1;
        $r1 &= $r0;
        $r1 ^= $r4;
        $r2 = (~$r2) & 0xFFFFFFFF;
        $r2 |= $r0;
        $r4 ^= $r2;
        
        $this->subkeys[$i++] = $r4 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r3 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r1 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r0 & 0xFFFFFFFF;

        // === ROUND 84 ===
        $tt = $w4 ^ $w7 ^ $w1 ^ $w3 ^ (0x9E3779B9 ^ 84);
        $w4 = $this->rotl32($tt, 11);
        $tt = $w5 ^ $w0 ^ $w2 ^ $w4 ^ (0x9E3779B9 ^ 85);
        $w5 = $this->rotl32($tt, 11);
        $tt = $w6 ^ $w1 ^ $w3 ^ $w5 ^ (0x9E3779B9 ^ 86);
        $w6 = $this->rotl32($tt, 11);
        $tt = $w7 ^ $w2 ^ $w4 ^ $w6 ^ (0x9E3779B9 ^ 87);
        $w7 = $this->rotl32($tt, 11);
        
        $r0 = $w4;
        $r1 = $w5;
        $r2 = $w6;
        $r3 = $w7;
        $r2 = (~$r2) & 0xFFFFFFFF;
        $r4 = $r3;
        $r3 &= $r0;
        $r0 ^= $r4;
        $r3 ^= $r2;
        $r2 |= $r4;
        $r1 ^= $r3;
        $r2 ^= $r0;
        $r0 |= $r1;
        $r2 ^= $r1;
        $r4 ^= $r0;
        $r0 |= $r3;
        $r0 ^= $r2;
        $r4 ^= $r3;
        $r4 ^= $r0;
        $r3 = (~$r3) & 0xFFFFFFFF;
        $r2 &= $r4;
        $r2 ^= $r3;
        
        $this->subkeys[$i++] = $r0 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r1 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r4 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r2 & 0xFFFFFFFF;

        // === ROUND 88 ===
        $tt = $w0 ^ $w3 ^ $w5 ^ $w7 ^ (0x9E3779B9 ^ 88);
        $w0 = $this->rotl32($tt, 11);
        $tt = $w1 ^ $w4 ^ $w6 ^ $w0 ^ (0x9E3779B9 ^ 89);
        $w1 = $this->rotl32($tt, 11);
        $tt = $w2 ^ $w5 ^ $w7 ^ $w1 ^ (0x9E3779B9 ^ 90);
        $w2 = $this->rotl32($tt, 11);
        $tt = $w3 ^ $w6 ^ $w0 ^ $w2 ^ (0x9E3779B9 ^ 91);
        $w3 = $this->rotl32($tt, 11);
        
        $r0 = $w0;
        $r1 = $w1;
        $r2 = $w2;
        $r3 = $w3;
        $r0 ^= $r1;
        $r1 ^= $r3;
        $r3 = (~$r3) & 0xFFFFFFFF;
        $r4 = $r1;
        $r1 &= $r0;
        $r2 ^= $r3;
        $r1 ^= $r2;
        $r2 |= $r4;
        $r4 ^= $r3;
        $r3 &= $r1;
        $r3 ^= $r0;
        $r4 ^= $r1;
        $r4 ^= $r2;
        $r2 ^= $r0;
        $r0 &= $r3;
        $r2 = (~$r2) & 0xFFFFFFFF;
        $r0 ^= $r4;
        $r4 |= $r3;
        $r2 ^= $r4;
        
        $this->subkeys[$i++] = $r1 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r3 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r0 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r2 & 0xFFFFFFFF;

        // === ROUND 92 ===
        $tt = $w4 ^ $w7 ^ $w1 ^ $w3 ^ (0x9E3779B9 ^ 92);
        $w4 = $this->rotl32($tt, 11);
        $tt = $w5 ^ $w0 ^ $w2 ^ $w4 ^ (0x9E3779B9 ^ 93);
        $w5 = $this->rotl32($tt, 11);
        $tt = $w6 ^ $w1 ^ $w3 ^ $w5 ^ (0x9E3779B9 ^ 94);
        $w6 = $this->rotl32($tt, 11);
        $tt = $w7 ^ $w2 ^ $w4 ^ $w6 ^ (0x9E3779B9 ^ 95);
        $w7 = $this->rotl32($tt, 11);
        
        $r0 = $w4;
        $r1 = $w5;
        $r2 = $w6;
        $r3 = $w7;
        $r1 ^= $r3;
        $r3 = (~$r3) & 0xFFFFFFFF;
        $r2 ^= $r3;
        $r3 ^= $r0;
        $r4 = $r1;
        $r1 &= $r3;
        $r1 ^= $r2;
        $r4 ^= $r3;
        $r0 ^= $r4;
        $r2 &= $r4;
        $r2 ^= $r0;
        $r0 &= $r1;
        $r3 ^= $r0;
        $r4 |= $r1;
        $r4 ^= $r0;
        $r0 |= $r3;
        $r0 ^= $r2;
        $r2 &= $r3;
        $r0 = (~$r0) & 0xFFFFFFFF;
        $r4 ^= $r2;
        
        $this->subkeys[$i++] = $r1 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r4 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r0 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r3 & 0xFFFFFFFF;

        // === ROUND 96 ===
        $tt = $w0 ^ $w3 ^ $w5 ^ $w7 ^ (0x9E3779B9 ^ 96);
        $w0 = $this->rotl32($tt, 11);
        $tt = $w1 ^ $w4 ^ $w6 ^ $w0 ^ (0x9E3779B9 ^ 97);
        $w1 = $this->rotl32($tt, 11);
        $tt = $w2 ^ $w5 ^ $w7 ^ $w1 ^ (0x9E3779B9 ^ 98);
        $w2 = $this->rotl32($tt, 11);
        $tt = $w3 ^ $w6 ^ $w0 ^ $w2 ^ (0x9E3779B9 ^ 99);
        $w3 = $this->rotl32($tt, 11);
        
        $r0 = $w0;
        $r1 = $w1;
        $r2 = $w2;
        $r3 = $w3;
        $r4 = $r0;
        $r0 |= $r3;
        $r3 ^= $r1;
        $r1 &= $r4;
        $r4 ^= $r2;
        $r2 ^= $r3;
        $r3 &= $r0;
        $r4 |= $r1;
        $r3 ^= $r4;
        $r0 ^= $r1;
        $r4 &= $r0;
        $r1 ^= $r3;
        $r4 ^= $r2;
        $r1 |= $r0;
        $r1 ^= $r2;
        $r0 ^= $r3;
        $r2 = $r1;
        $r1 |= $r3;
        $r1 ^= $r0;
        
        $this->subkeys[$i++] = $r1 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r2 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r3 & 0xFFFFFFFF;
        $this->subkeys[$i++] = $r4 & 0xFFFFFFFF;
    }

    private function ivSetup($iv) {
        $nonce = array_fill(0, 16, 0);
        $ivLen = strlen($iv);
        $ivBytes = array_values(unpack('C*', $iv));
        
        for ($i = 0; $i < $ivLen && $i < 16; $i++) {
            $nonce[$i] = $ivBytes[$i];
        }

        $r0 = $this->le32($nonce, 0);
        $r1 = $this->le32($nonce, 4);
        $r2 = $this->le32($nonce, 8);
        $r3 = $this->le32($nonce, 12);

        $r0 ^= $this->subkeys[0];
        $r1 ^= $this->subkeys[1];
        $r2 ^= $this->subkeys[2];
        $r3 ^= $this->subkeys[3];
        
        $r3 ^= $r0;
        $r4 = $r1;
        $r1 &= $r3;
        $r4 ^= $r2;
        $r1 ^= $r0;
        $r0 |= $r3;
        $r0 ^= $r4;
        $r4 ^= $r3;
        $r3 ^= $r2;
        $r2 |= $r1;
        $r2 ^= $r4;
        $r4 = (~$r4) & 0xFFFFFFFF;
        $r4 |= $r1;
        $r1 ^= $r3;
        $r1 ^= $r4;
        $r3 |= $r0;
        $r1 ^= $r3;
        $r4 ^= $r3;
        
        $r1 = $this->rotl32($r1, 13);
        $r2 = $this->rotl32($r2, 3);
        $r4 = $r4 ^ $r1 ^ $r2;
        $r0 = $r0 ^ $r2 ^ ($this->shl32($r1, 3));
        $r4 = $this->rotl32($r4, 1);
        $r0 = $this->rotl32($r0, 7);
        $r1 = $r1 ^ $r4 ^ $r0;
        $r2 = $r2 ^ $r0 ^ ($this->shl32($r4, 7));
        $r1 = $this->rotl32($r1, 5);
        $r2 = $this->rotl32($r2, 22);
        
        $r1 ^= $this->subkeys[4];
        $r4 ^= $this->subkeys[5];
        $r2 ^= $this->subkeys[6];
        $r0 ^= $this->subkeys[7];
        
        $r1 = (~$r1) & 0xFFFFFFFF;
        $r2 = (~$r2) & 0xFFFFFFFF;
        $r3 = $r1;
        $r1 &= $r4;
        $r2 ^= $r1;
        $r1 |= $r0;
        $r0 ^= $r2;
        $r4 ^= $r1;
        $r1 ^= $r3;
        $r3 |= $r4;
        $r4 ^= $r0;
        $r2 |= $r1;
        $r2 &= $r3;
        $r1 ^= $r4;
        $r4 &= $r2;
        $r4 ^= $r1;
        $r1 &= $r2;
        $r1 ^= $r3;
        
        $r2 = $this->rotl32($r2, 13);
        $r0 = $this->rotl32($r0, 3);
        $r1 = $r1 ^ $r2 ^ $r0;
        $r4 = $r4 ^ $r0 ^ ($this->shl32($r2, 3));
        $r1 = $this->rotl32($r1, 1);
        $r4 = $this->rotl32($r4, 7);
        $r2 = $r2 ^ $r1 ^ $r4;
        $r0 = $r0 ^ $r4 ^ ($this->shl32($r1, 7));
        $r2 = $this->rotl32($r2, 5);
        $r0 = $this->rotl32($r0, 22);
        
        $r2 ^= $this->subkeys[8];
        $r1 ^= $this->subkeys[9];
        $r0 ^= $this->subkeys[10];
        $r4 ^= $this->subkeys[11];
        
        $r3 = $r2;
        $r2 &= $r0;
        $r2 ^= $r4;
        $r0 ^= $r1;
        $r0 ^= $r2;
        $r4 |= $r3;
        $r4 ^= $r1;
        $r3 ^= $r0;
        $r1 = $r4;
        $r4 |= $r3;
        $r4 ^= $r2;
        $r2 &= $r1;
        $r3 ^= $r2;
        $r1 ^= $r4;
        $r1 ^= $r3;
        $r3 = (~$r3) & 0xFFFFFFFF;
        
        $r0 = $this->rotl32($r0, 13);
        $r1 = $this->rotl32($r1, 3);
        $r4 = $r4 ^ $r0 ^ $r1;
        $r3 = $r3 ^ $r1 ^ ($this->shl32($r0, 3));
        $r4 = $this->rotl32($r4, 1);
        $r3 = $this->rotl32($r3, 7);
        $r0 = $r0 ^ $r4 ^ $r3;
        $r1 = $r1 ^ $r3 ^ ($this->shl32($r4, 7));
        $r0 = $this->rotl32($r0, 5);
        $r1 = $this->rotl32($r1, 22);
        
        $r0 ^= $this->subkeys[12];
        $r4 ^= $this->subkeys[13];
        $r1 ^= $this->subkeys[14];
        $r3 ^= $this->subkeys[15];
        
        $r2 = $r0;
        $r0 |= $r3;
        $r3 ^= $r4;
        $r4 &= $r2;
        $r2 ^= $r1;
        $r1 ^= $r3;
        $r3 &= $r0;
        $r2 |= $r4;
        $r3 ^= $r2;
        $r0 ^= $r4;
        $r2 &= $r0;
        $r4 ^= $r3;
        $r2 ^= $r1;
        $r4 |= $r0;
        $r4 ^= $r1;
        $r0 ^= $r3;
        $r1 = $r4;
        $r4 |= $r3;
        $r4 ^= $r0;
        
        $r4 = $this->rotl32($r4, 13);
        $r3 = $this->rotl32($r3, 3);
        $r1 = $r1 ^ $r4 ^ $r3;
        $r2 = $r2 ^ $r3 ^ ($this->shl32($r4, 3));
        $r1 = $this->rotl32($r1, 1);
        $r2 = $this->rotl32($r2, 7);
        $r4 = $r4 ^ $r1 ^ $r2;
        $r3 = $r3 ^ $r2 ^ ($this->shl32($r1, 7));
        $r4 = $this->rotl32($r4, 5);
        $r3 = $this->rotl32($r3, 22);
        
        $r4 ^= $this->subkeys[16];
        $r1 ^= $this->subkeys[17];
        $r3 ^= $this->subkeys[18];
        $r2 ^= $this->subkeys[19];
        
        $r1 ^= $r2;
        $r2 = (~$r2) & 0xFFFFFFFF;
        $r3 ^= $r2;
        $r2 ^= $r4;
        $r0 = $r1;
        $r1 &= $r2;
        $r1 ^= $r3;
        $r0 ^= $r2;
        $r4 ^= $r0;
        $r3 &= $r0;
        $r3 ^= $r4;
        $r4 &= $r1;
        $r2 ^= $r4;
        $r0 |= $r1;
        $r0 ^= $r4;
        $r4 |= $r2;
        $r4 ^= $r3;
        $r3 &= $r2;
        $r4 = (~$r4) & 0xFFFFFFFF;
        $r0 ^= $r3;
        
        $r1 = $this->rotl32($r1, 13);
        $r4 = $this->rotl32($r4, 3);
        $r0 = $r0 ^ $r1 ^ $r4;
        $r2 = $r2 ^ $r4 ^ ($this->shl32($r1, 3));
        $r0 = $this->rotl32($r0, 1);
        $r2 = $this->rotl32($r2, 7);
        $r1 = $r1 ^ $r0 ^ $r2;
        $r4 = $r4 ^ $r2 ^ ($this->shl32($r0, 7));
        $r1 = $this->rotl32($r1, 5);
        $r4 = $this->rotl32($r4, 22);
        
        $r1 ^= $this->subkeys[20];
        $r0 ^= $this->subkeys[21];
        $r4 ^= $this->subkeys[22];
        $r2 ^= $this->subkeys[23];
        
        $r1 ^= $r0;
        $r0 ^= $r2;
        $r2 = (~$r2) & 0xFFFFFFFF;
        $r3 = $r0;
        $r0 &= $r1;
        $r4 ^= $r2;
        $r0 ^= $r4;
        $r4 |= $r3;
        $r3 ^= $r2;
        $r2 &= $r0;
        $r2 ^= $r1;
        $r3 ^= $r0;
        $r3 ^= $r4;
        $r4 ^= $r1;
        $r1 &= $r2;
        $r4 = (~$r4) & 0xFFFFFFFF;
        $r1 ^= $r3;
        $r3 |= $r2;
        $r4 ^= $r3;
        
        $r0 = $this->rotl32($r0, 13);
        $r1 = $this->rotl32($r1, 3);
        $r2 = $r2 ^ $r0 ^ $r1;
        $r4 = $r4 ^ $r1 ^ ($this->shl32($r0, 3));
        $r2 = $this->rotl32($r2, 1);
        $r4 = $this->rotl32($r4, 7);
        $r0 = $r0 ^ $r2 ^ $r4;
        $r1 = $r1 ^ $r4 ^ ($this->shl32($r2, 7));
        $r0 = $this->rotl32($r0, 5);
        $r1 = $this->rotl32($r1, 22);
        
        $r0 ^= $this->subkeys[24];
        $r2 ^= $this->subkeys[25];
        $r1 ^= $this->subkeys[26];
        $r4 ^= $this->subkeys[27];
        
        $r1 = (~$r1) & 0xFFFFFFFF;
        $r3 = $r4;
        $r4 &= $r0;
        $r0 ^= $r3;
        $r4 ^= $r1;
        $r1 |= $r3;
        $r2 ^= $r4;
        $r1 ^= $r0;
        $r0 |= $r2;
        $r1 ^= $r2;
        $r3 ^= $r0;
        $r0 |= $r4;
        $r0 ^= $r1;
        $r3 ^= $r4;
        $r3 ^= $r0;
        $r4 = (~$r4) & 0xFFFFFFFF;
        $r1 &= $r3;
        $r1 ^= $r4;
        
        $r0 = $this->rotl32($r0, 13);
        $r3 = $this->rotl32($r3, 3);
        $r2 = $r2 ^ $r0 ^ $r3;
        $r1 = $r1 ^ $r3 ^ ($this->shl32($r0, 3));
        $r2 = $this->rotl32($r2, 1);
        $r1 = $this->rotl32($r1, 7);
        $r0 = $r0 ^ $r2 ^ $r1;
        $r3 = $r3 ^ $r1 ^ ($this->shl32($r2, 7));
        $r0 = $this->rotl32($r0, 5);
        $r3 = $this->rotl32($r3, 22);
        
        $r0 ^= $this->subkeys[28];
        $r2 ^= $this->subkeys[29];
        $r3 ^= $this->subkeys[30];
        $r1 ^= $this->subkeys[31];
        
        $r4 = $r2;
        $r2 |= $r3;
        $r2 ^= $r1;
        $r4 ^= $r3;
        $r3 ^= $r2;
        $r1 |= $r4;
        $r1 &= $r0;
        $r4 ^= $r3;
        $r1 ^= $r2;
        $r2 |= $r4;
        $r2 ^= $r0;
        $r0 |= $r4;
        $r0 ^= $r3;
        $r2 ^= $r4;
        $r3 ^= $r2;
        $r2 &= $r0;
        $r2 ^= $r4;
        $r3 = (~$r3) & 0xFFFFFFFF;
        $r3 |= $r0;
        $r4 ^= $r3;
        
        $r4 = $this->rotl32($r4, 13);
        $r2 = $this->rotl32($r2, 3);
        $r1 = $r1 ^ $r4 ^ $r2;
        $r0 = $r0 ^ $r2 ^ ($this->shl32($r4, 3));
        $r1 = $this->rotl32($r1, 1);
        $r0 = $this->rotl32($r0, 7);
        $r4 = $r4 ^ $r1 ^ $r0;
        $r2 = $r2 ^ $r0 ^ ($this->shl32($r1, 7));
        $r4 = $this->rotl32($r4, 5);
        $r2 = $this->rotl32($r2, 22);
        
        $r4 ^= $this->subkeys[32];
        $r1 ^= $this->subkeys[33];
        $r2 ^= $this->subkeys[34];
        $r0 ^= $this->subkeys[35];
        
        $r0 ^= $r4;
        $r3 = $r1;
        $r1 &= $r0;
        $r3 ^= $r2;
        $r1 ^= $r4;
        $r4 |= $r0;
        $r4 ^= $r3;
        $r3 ^= $r0;
        $r0 ^= $r2;
        $r2 |= $r1;
        $r2 ^= $r3;
        $r3 = (~$r3) & 0xFFFFFFFF;
        $r3 |= $r1;
        $r1 ^= $r0;
        $r1 ^= $r3;
        $r0 |= $r4;
        $r1 ^= $r0;
        $r3 ^= $r0;
        
        $r1 = $this->rotl32($r1, 13);
        $r2 = $this->rotl32($r2, 3);
        $r3 = $r3 ^ $r1 ^ $r2;
        $r4 = $r4 ^ $r2 ^ ($this->shl32($r1, 3));
        $r3 = $this->rotl32($r3, 1);
        $r4 = $this->rotl32($r4, 7);
        $r1 = $r1 ^ $r3 ^ $r4;
        $r2 = $r2 ^ $r4 ^ ($this->shl32($r3, 7));
        $r1 = $this->rotl32($r1, 5);
        $r2 = $this->rotl32($r2, 22);
        
        $r1 ^= $this->subkeys[36];
        $r3 ^= $this->subkeys[37];
        $r2 ^= $this->subkeys[38];
        $r4 ^= $this->subkeys[39];
        
        $r1 = (~$r1) & 0xFFFFFFFF;
        $r2 = (~$r2) & 0xFFFFFFFF;
        $r0 = $r1;
        $r1 &= $r3;
        $r2 ^= $r1;
        $r1 |= $r4;
        $r4 ^= $r2;
        $r3 ^= $r1;
        $r1 ^= $r0;
        $r0 |= $r3;
        $r3 ^= $r4;
        $r2 |= $r1;
        $r2 &= $r0;
        $r1 ^= $r3;
        $r3 &= $r2;
        $r3 ^= $r1;
        $r1 &= $r2;
        $r1 ^= $r0;
        
        $r2 = $this->rotl32($r2, 13);
        $r4 = $this->rotl32($r4, 3);
        $r1 = $r1 ^ $r2 ^ $r4;
        $r3 = $r3 ^ $r4 ^ ($this->shl32($r2, 3));
        $r1 = $this->rotl32($r1, 1);
        $r3 = $this->rotl32($r3, 7);
        $r2 = $r2 ^ $r1 ^ $r3;
        $r4 = $r4 ^ $r3 ^ ($this->shl32($r1, 7));
        $r2 = $this->rotl32($r2, 5);
        $r4 = $this->rotl32($r4, 22);
        
        $r2 ^= $this->subkeys[40];
        $r1 ^= $this->subkeys[41];
        $r4 ^= $this->subkeys[42];
        $r3 ^= $this->subkeys[43];
        
        $r0 = $r2;
        $r2 &= $r4;
        $r2 ^= $r3;
        $r4 ^= $r1;
        $r4 ^= $r2;
        $r3 |= $r0;
        $r3 ^= $r1;
        $r0 ^= $r4;
        $r1 = $r3;
        $r3 |= $r0;
        $r3 ^= $r2;
        $r2 &= $r1;
        $r0 ^= $r2;
        $r1 ^= $r3;
        $r1 ^= $r0;
        $r0 = (~$r0) & 0xFFFFFFFF;
        
        $r4 = $this->rotl32($r4, 13);
        $r1 = $this->rotl32($r1, 3);
        $r3 = $r3 ^ $r4 ^ $r1;
        $r0 = $r0 ^ $r1 ^ ($this->shl32($r4, 3));
        $r3 = $this->rotl32($r3, 1);
        $r0 = $this->rotl32($r0, 7);
        $r4 = $r4 ^ $r3 ^ $r0;
        $r1 = $r1 ^ $r0 ^ ($this->shl32($r3, 7));
        $r4 = $this->rotl32($r4, 5);
        $r1 = $this->rotl32($r1, 22);
        
        $r4 ^= $this->subkeys[44];
        $r3 ^= $this->subkeys[45];
        $r1 ^= $this->subkeys[46];
        $r0 ^= $this->subkeys[47];
        
        $r2 = $r4;
        $r4 |= $r0;
        $r0 ^= $r3;
        $r3 &= $r2;
        $r2 ^= $r1;
        $r1 ^= $r0;
        $r0 &= $r4;
        $r2 |= $r3;
        $r0 ^= $r2;
        $r4 ^= $r3;
        $r2 &= $r4;
        $r3 ^= $r0;
        $r2 ^= $r1;
        $r3 |= $r4;
        $r3 ^= $r1;
        $r4 ^= $r0;
        $r1 = $r3;
        $r3 |= $r0;
        $r3 ^= $r4;
        
        $r3 = $this->rotl32($r3, 13);
        $r0 = $this->rotl32($r0, 3);
        $r1 = $r1 ^ $r3 ^ $r0;
        $r2 = $r2 ^ $r0 ^ ($this->shl32($r3, 3));
        $r1 = $this->rotl32($r1, 1);
        $r2 = $this->rotl32($r2, 7);
        $r3 = $r3 ^ $r1 ^ $r2;
        $r0 = $r0 ^ $r2 ^ ($this->shl32($r1, 7));
        $r3 = $this->rotl32($r3, 5);
        $r0 = $this->rotl32($r0, 22);
        
        $this->lfsr[9] = $r3 & 0xFFFFFFFF;
        $this->lfsr[8] = $r1 & 0xFFFFFFFF;
        $this->lfsr[7] = $r0 & 0xFFFFFFFF;
        $this->lfsr[6] = $r2 & 0xFFFFFFFF;
        
        $r3 ^= $this->subkeys[48];
        $r1 ^= $this->subkeys[49];
        $r0 ^= $this->subkeys[50];
        $r2 ^= $this->subkeys[51];
        
        $r1 ^= $r2;
        $r2 = (~$r2) & 0xFFFFFFFF;
        $r0 ^= $r2;
        $r2 ^= $r3;
        $r4 = $r1;
        $r1 &= $r2;
        $r1 ^= $r0;
        $r4 ^= $r2;
        $r3 ^= $r4;
        $r0 &= $r4;
        $r0 ^= $r3;
        $r3 &= $r1;
        $r2 ^= $r3;
        $r4 |= $r1;
        $r4 ^= $r3;
        $r3 |= $r2;
        $r3 ^= $r0;
        $r0 &= $r2;
        $r3 = (~$r3) & 0xFFFFFFFF;
        $r4 ^= $r0;
        
        $r1 = $this->rotl32($r1, 13);
        $r3 = $this->rotl32($r3, 3);
        $r4 = $r4 ^ $r1 ^ $r3;
        $r2 = $r2 ^ $r3 ^ ($this->shl32($r1, 3));
        $r4 = $this->rotl32($r4, 1);
        $r2 = $this->rotl32($r2, 7);
        $r1 = $r1 ^ $r4 ^ $r2;
        $r3 = $r3 ^ $r2 ^ ($this->shl32($r4, 7));
        $r1 = $this->rotl32($r1, 5);
        $r3 = $this->rotl32($r3, 22);
        
        $r1 ^= $this->subkeys[52];
        $r4 ^= $this->subkeys[53];
        $r3 ^= $this->subkeys[54];
        $r2 ^= $this->subkeys[55];
        
        $r1 ^= $r4;
        $r4 ^= $r2;
        $r2 = (~$r2) & 0xFFFFFFFF;
        $r0 = $r4;
        $r4 &= $r1;
        $r3 ^= $r2;
        $r4 ^= $r3;
        $r3 |= $r0;
        $r0 ^= $r2;
        $r2 &= $r4;
        $r2 ^= $r1;
        $r0 ^= $r4;
        $r0 ^= $r3;
        $r3 ^= $r1;
        $r1 &= $r2;
        $r3 = (~$r3) & 0xFFFFFFFF;
        $r1 ^= $r0;
        $r0 |= $r2;
        $r3 ^= $r0;
        
        $r4 = $this->rotl32($r4, 13);
        $r1 = $this->rotl32($r1, 3);
        $r2 = $r2 ^ $r4 ^ $r1;
        $r3 = $r3 ^ $r1 ^ ($this->shl32($r4, 3));
        $r2 = $this->rotl32($r2, 1);
        $r3 = $this->rotl32($r3, 7);
        $r4 = $r4 ^ $r2 ^ $r3;
        $r1 = $r1 ^ $r3 ^ ($this->shl32($r2, 7));
        $r4 = $this->rotl32($r4, 5);
        $r1 = $this->rotl32($r1, 22);
        
        $r4 ^= $this->subkeys[56];
        $r2 ^= $this->subkeys[57];
        $r1 ^= $this->subkeys[58];
        $r3 ^= $this->subkeys[59];
        
        $r1 = (~$r1) & 0xFFFFFFFF;
        $r0 = $r3;
        $r3 &= $r4;
        $r4 ^= $r0;
        $r3 ^= $r1;
        $r1 |= $r0;
        $r2 ^= $r3;
        $r1 ^= $r4;
        $r4 |= $r2;
        $r1 ^= $r2;
        $r0 ^= $r4;
        $r4 |= $r3;
        $r4 ^= $r1;
        $r0 ^= $r3;
        $r0 ^= $r4;
        $r3 = (~$r3) & 0xFFFFFFFF;
        $r1 &= $r0;
        $r1 ^= $r3;
        
        $r4 = $this->rotl32($r4, 13);
        $r0 = $this->rotl32($r0, 3);
        $r2 = $r2 ^ $r4 ^ $r0;
        $r1 = $r1 ^ $r0 ^ ($this->shl32($r4, 3));
        $r2 = $this->rotl32($r2, 1);
        $r1 = $this->rotl32($r1, 7);
        $r4 = $r4 ^ $r2 ^ $r1;
        $r0 = $r0 ^ $r1 ^ ($this->shl32($r2, 7));
        $r4 = $this->rotl32($r4, 5);
        $r0 = $this->rotl32($r0, 22);
        
        $r4 ^= $this->subkeys[60];
        $r2 ^= $this->subkeys[61];
        $r0 ^= $this->subkeys[62];
        $r1 ^= $this->subkeys[63];
        
        $r3 = $r2;
        $r2 |= $r0;
        $r2 ^= $r1;
        $r3 ^= $r0;
        $r0 ^= $r2;
        $r1 |= $r3;
        $r1 &= $r4;
        $r3 ^= $r0;
        $r1 ^= $r2;
        $r2 |= $r3;
        $r2 ^= $r4;
        $r4 |= $r3;
        $r4 ^= $r0;
        $r2 ^= $r3;
        $r0 ^= $r2;
        $r2 &= $r4;
        $r2 ^= $r3;
        $r0 = (~$r0) & 0xFFFFFFFF;
        $r0 |= $r4;
        $r3 ^= $r0;
        
        $r3 = $this->rotl32($r3, 13);
        $r2 = $this->rotl32($r2, 3);
        $r1 = $r1 ^ $r3 ^ $r2;
        $r4 = $r4 ^ $r2 ^ ($this->shl32($r3, 3));
        $r1 = $this->rotl32($r1, 1);
        $r4 = $this->rotl32($r4, 7);
        $r3 = $r3 ^ $r1 ^ $r4;
        $r2 = $r2 ^ $r4 ^ ($this->shl32($r1, 7));
        $r3 = $this->rotl32($r3, 5);
        $r2 = $this->rotl32($r2, 22);
        
        $r3 ^= $this->subkeys[64];
        $r1 ^= $this->subkeys[65];
        $r2 ^= $this->subkeys[66];
        $r4 ^= $this->subkeys[67];
        
        $r4 ^= $r3;
        $r0 = $r1;
        $r1 &= $r4;
        $r0 ^= $r2;
        $r1 ^= $r3;
        $r3 |= $r4;
        $r3 ^= $r0;
        $r0 ^= $r4;
        $r4 ^= $r2;
        $r2 |= $r1;
        $r2 ^= $r0;
        $r0 = (~$r0) & 0xFFFFFFFF;
        $r0 |= $r1;
        $r1 ^= $r4;
        $r1 ^= $r0;
        $r4 |= $r3;
        $r1 ^= $r4;
        $r0 ^= $r4;
        
        $r1 = $this->rotl32($r1, 13);
        $r2 = $this->rotl32($r2, 3);
        $r0 = $r0 ^ $r1 ^ $r2;
        $r3 = $r3 ^ $r2 ^ ($this->shl32($r1, 3));
        $r0 = $this->rotl32($r0, 1);
        $r3 = $this->rotl32($r3, 7);
        $r1 = $r1 ^ $r0 ^ $r3;
        $r2 = $r2 ^ $r3 ^ ($this->shl32($r0, 7));
        $r1 = $this->rotl32($r1, 5);
        $r2 = $this->rotl32($r2, 22);
        
        $r1 ^= $this->subkeys[68];
        $r0 ^= $this->subkeys[69];
        $r2 ^= $this->subkeys[70];
        $r3 ^= $this->subkeys[71];
        
        $r1 = (~$r1) & 0xFFFFFFFF;
        $r2 = (~$r2) & 0xFFFFFFFF;
        $r4 = $r1;
        $r1 &= $r0;
        $r2 ^= $r1;
        $r1 |= $r3;
        $r3 ^= $r2;
        $r0 ^= $r1;
        $r1 ^= $r4;
        $r4 |= $r0;
        $r0 ^= $r3;
        $r2 |= $r1;
        $r2 &= $r4;
        $r1 ^= $r0;
        $r0 &= $r2;
        $r0 ^= $r1;
        $r1 &= $r2;
        $r1 ^= $r4;
        
        $r2 = $this->rotl32($r2, 13);
        $r3 = $this->rotl32($r3, 3);
        $r1 = $r1 ^ $r2 ^ $r3;
        $r0 = $r0 ^ $r3 ^ ($this->shl32($r2, 3));
        $r1 = $this->rotl32($r1, 1);
        $r0 = $this->rotl32($r0, 7);
        $r2 = $r2 ^ $r1 ^ $r0;
        $r3 = $r3 ^ $r0 ^ ($this->shl32($r1, 7));
        $r2 = $this->rotl32($r2, 5);
        $r3 = $this->rotl32($r3, 22);
        
        $this->fsmR[0] = $r2 & 0xFFFFFFFF;
        $this->lfsr[4] = $r1 & 0xFFFFFFFF;
        $this->fsmR[1] = $r3 & 0xFFFFFFFF;
        $this->lfsr[5] = $r0 & 0xFFFFFFFF;
        
        $r2 ^= $this->subkeys[72];
        $r1 ^= $this->subkeys[73];
        $r3 ^= $this->subkeys[74];
        $r0 ^= $this->subkeys[75];
        
        $r4 = $r2;
        $r2 &= $r3;
        $r2 ^= $r0;
        $r3 ^= $r1;
        $r3 ^= $r2;
        $r0 |= $r4;
        $r0 ^= $r1;
        $r4 ^= $r3;
        $r1 = $r0;
        $r0 |= $r4;
        $r0 ^= $r2;
        $r2 &= $r1;
        $r4 ^= $r2;
        $r1 ^= $r0;
        $r1 ^= $r4;
        $r4 = (~$r4) & 0xFFFFFFFF;
        
        $r3 = $this->rotl32($r3, 13);
        $r1 = $this->rotl32($r1, 3);
        $r0 = $r0 ^ $r3 ^ $r1;
        $r4 = $r4 ^ $r1 ^ ($this->shl32($r3, 3));
        $r0 = $this->rotl32($r0, 1);
        $r4 = $this->rotl32($r4, 7);
        $r3 = $r3 ^ $r0 ^ $r4;
        $r1 = $r1 ^ $r4 ^ ($this->shl32($r0, 7));
        $r3 = $this->rotl32($r3, 5);
        $r1 = $this->rotl32($r1, 22);
        
        $r3 ^= $this->subkeys[76];
        $r0 ^= $this->subkeys[77];
        $r1 ^= $this->subkeys[78];
        $r4 ^= $this->subkeys[79];
        
        $r2 = $r3;
        $r3 |= $r4;
        $r4 ^= $r0;
        $r0 &= $r2;
        $r2 ^= $r1;
        $r1 ^= $r4;
        $r4 &= $r3;
        $r2 |= $r0;
        $r4 ^= $r2;
        $r3 ^= $r0;
        $r2 &= $r3;
        $r0 ^= $r4;
        $r2 ^= $r1;
        $r0 |= $r3;
        $r0 ^= $r1;
        $r3 ^= $r4;
        $r1 = $r0;
        $r0 |= $r4;
        $r0 ^= $r3;
        
        $r0 = $this->rotl32($r0, 13);
        $r4 = $this->rotl32($r4, 3);
        $r1 = $r1 ^ $r0 ^ $r4;
        $r2 = $r2 ^ $r4 ^ ($this->shl32($r0, 3));
        $r1 = $this->rotl32($r1, 1);
        $r2 = $this->rotl32($r2, 7);
        $r0 = $r0 ^ $r1 ^ $r2;
        $r4 = $r4 ^ $r2 ^ ($this->shl32($r1, 7));
        $r0 = $this->rotl32($r0, 5);
        $r4 = $this->rotl32($r4, 22);
        
        $r0 ^= $this->subkeys[80];
        $r1 ^= $this->subkeys[81];
        $r4 ^= $this->subkeys[82];
        $r2 ^= $this->subkeys[83];
        
        $r1 ^= $r2;
        $r2 = (~$r2) & 0xFFFFFFFF;
        $r4 ^= $r2;
        $r2 ^= $r0;
        $r3 = $r1;
        $r1 &= $r2;
        $r1 ^= $r4;
        $r3 ^= $r2;
        $r0 ^= $r3;
        $r4 &= $r3;
        $r4 ^= $r0;
        $r0 &= $r1;
        $r2 ^= $r0;
        $r3 |= $r1;
        $r3 ^= $r0;
        $r0 |= $r2;
        $r0 ^= $r4;
        $r4 &= $r2;
        $r0 = (~$r0) & 0xFFFFFFFF;
        $r3 ^= $r4;
        
        $r1 = $this->rotl32($r1, 13);
        $r0 = $this->rotl32($r0, 3);
        $r3 = $r3 ^ $r1 ^ $r0;
        $r2 = $r2 ^ $r0 ^ ($this->shl32($r1, 3));
        $r3 = $this->rotl32($r3, 1);
        $r2 = $this->rotl32($r2, 7);
        $r1 = $r1 ^ $r3 ^ $r2;
        $r0 = $r0 ^ $r2 ^ ($this->shl32($r3, 7));
        $r1 = $this->rotl32($r1, 5);
        $r0 = $this->rotl32($r0, 22);
        
        $r1 ^= $this->subkeys[84];
        $r3 ^= $this->subkeys[85];
        $r0 ^= $this->subkeys[86];
        $r2 ^= $this->subkeys[87];
        
        $r1 ^= $r3;
        $r3 ^= $r2;
        $r2 = (~$r2) & 0xFFFFFFFF;
        $r4 = $r3;
        $r3 &= $r1;
        $r0 ^= $r2;
        $r3 ^= $r0;
        $r0 |= $r4;
        $r4 ^= $r2;
        $r2 &= $r3;
        $r2 ^= $r1;
        $r4 ^= $r3;
        $r4 ^= $r0;
        $r0 ^= $r1;
        $r1 &= $r2;
        $r0 = (~$r0) & 0xFFFFFFFF;
        $r1 ^= $r4;
        $r4 |= $r2;
        $r0 ^= $r4;
        
        $r3 = $this->rotl32($r3, 13);
        $r1 = $this->rotl32($r1, 3);
        $r2 = $r2 ^ $r3 ^ $r1;
        $r0 = $r0 ^ $r1 ^ ($this->shl32($r3, 3));
        $r2 = $this->rotl32($r2, 1);
        $r0 = $this->rotl32($r0, 7);
        $r3 = $r3 ^ $r2 ^ $r0;
        $r1 = $r1 ^ $r0 ^ ($this->shl32($r2, 7));
        $r3 = $this->rotl32($r3, 5);
        $r1 = $this->rotl32($r1, 22);
        
        $r3 ^= $this->subkeys[88];
        $r2 ^= $this->subkeys[89];
        $r1 ^= $this->subkeys[90];
        $r0 ^= $this->subkeys[91];
        
        $r1 = (~$r1) & 0xFFFFFFFF;
        $r4 = $r0;
        $r0 &= $r3;
        $r3 ^= $r4;
        $r0 ^= $r1;
        $r1 |= $r4;
        $r2 ^= $r0;
        $r1 ^= $r3;
        $r3 |= $r2;
        $r1 ^= $r2;
        $r4 ^= $r3;
        $r3 |= $r0;
        $r3 ^= $r1;
        $r4 ^= $r0;
        $r4 ^= $r3;
        $r0 = (~$r0) & 0xFFFFFFFF;
        $r1 &= $r4;
        $r1 ^= $r0;
        
        $r3 = $this->rotl32($r3, 13);
        $r4 = $this->rotl32($r4, 3);
        $r2 = $r2 ^ $r3 ^ $r4;
        $r1 = $r1 ^ $r4 ^ ($this->shl32($r3, 3));
        $r2 = $this->rotl32($r2, 1);
        $r1 = $this->rotl32($r1, 7);
        $r3 = $r3 ^ $r2 ^ $r1;
        $r4 = $r4 ^ $r1 ^ ($this->shl32($r2, 7));
        $r3 = $this->rotl32($r3, 5);
        $r4 = $this->rotl32($r4, 22);
        
        $r3 ^= $this->subkeys[92];
        $r2 ^= $this->subkeys[93];
        $r4 ^= $this->subkeys[94];
        $r1 ^= $this->subkeys[95];
        
        $r0 = $r2;
        $r2 |= $r4;
        $r2 ^= $r1;
        $r0 ^= $r4;
        $r4 ^= $r2;
        $r1 |= $r0;
        $r1 &= $r3;
        $r0 ^= $r4;
        $r1 ^= $r2;
        $r2 |= $r0;
        $r2 ^= $r3;
        $r3 |= $r0;
        $r3 ^= $r4;
        $r2 ^= $r0;
        $r4 ^= $r2;
        $r2 &= $r3;
        $r2 ^= $r0;
        $r4 = (~$r4) & 0xFFFFFFFF;
        $r4 |= $r3;
        $r0 ^= $r4;
        
        $r0 = $this->rotl32($r0, 13);
        $r2 = $this->rotl32($r2, 3);
        $r1 = $r1 ^ $r0 ^ $r2;
        $r3 = $r3 ^ $r2 ^ ($this->shl32($r0, 3));
        $r1 = $this->rotl32($r1, 1);
        $r3 = $this->rotl32($r3, 7);
        $r0 = $r0 ^ $r1 ^ $r3;
        $r2 = $r2 ^ $r3 ^ ($this->shl32($r1, 7));
        $r0 = $this->rotl32($r0, 5);
        $r2 = $this->rotl32($r2, 22);
        
        $r0 ^= $this->subkeys[96];
        $r1 ^= $this->subkeys[97];
        $r2 ^= $this->subkeys[98];
        $r3 ^= $this->subkeys[99];
        
        $this->lfsr[3] = $r0 & 0xFFFFFFFF;
        $this->lfsr[2] = $r1 & 0xFFFFFFFF;
        $this->lfsr[1] = $r2 & 0xFFFFFFFF;
        $this->lfsr[0] = $r3 & 0xFFFFFFFF;
    }

    private function advanceState() {
        $s0 = $this->lfsr[0];
        $s1 = $this->lfsr[1];
        $s2 = $this->lfsr[2];
        $s3 = $this->lfsr[3];
        $s4 = $this->lfsr[4];
        $s5 = $this->lfsr[5];
        $s6 = $this->lfsr[6];
        $s7 = $this->lfsr[7];
        $s8 = $this->lfsr[8];
        $s9 = $this->lfsr[9];
        $r1 = $this->fsmR[0];
        $r2 = $this->fsmR[1];
        
        $tt = $r1;
        if (($r1 & 0x01) != 0) {
            $r1 = ($r2 + ($s1 ^ $s8)) & 0xFFFFFFFF;
        } else {
            $r1 = ($r2 + $s1) & 0xFFFFFFFF;
        }
        $r2 = $this->rotl32(($tt * 0x54655307) & 0xFFFFFFFF, 7);
        $v0 = $s0;
        $s0 = ((($this->shl32($s0, 8)) ^ self::$alphaMulTable[($s0 >> 24) & 0xFF]) ^ 
               (($s3 >> 8) ^ self::$alphaDivTable[$s3 & 0xFF]) ^ $s9) & 0xFFFFFFFF;
        $f0 = ($s9 + $r1 ^ $r2) & 0xFFFFFFFF;

        $tt = $r1;
        if (($r1 & 0x01) != 0) {
            $r1 = ($r2 + ($s2 ^ $s9)) & 0xFFFFFFFF;
        } else {
            $r1 = ($r2 + $s2) & 0xFFFFFFFF;
        }
        $r2 = $this->rotl32(($tt * 0x54655307) & 0xFFFFFFFF, 7);
        $v1 = $s1;
        $s1 = ((($this->shl32($s1, 8)) ^ self::$alphaMulTable[($s1 >> 24) & 0xFF]) ^ 
               (($s4 >> 8) ^ self::$alphaDivTable[$s4 & 0xFF]) ^ $s0) & 0xFFFFFFFF;
        $f1 = ($s0 + $r1 ^ $r2) & 0xFFFFFFFF;

        $tt = $r1;
        if (($r1 & 0x01) != 0) {
            $r1 = ($r2 + ($s3 ^ $s0)) & 0xFFFFFFFF;
        } else {
            $r1 = ($r2 + $s3) & 0xFFFFFFFF;
        }
        $r2 = $this->rotl32(($tt * 0x54655307) & 0xFFFFFFFF, 7);
        $v2 = $s2;
        $s2 = ((($this->shl32($s2, 8)) ^ self::$alphaMulTable[($s2 >> 24) & 0xFF]) ^ 
               (($s5 >> 8) ^ self::$alphaDivTable[$s5 & 0xFF]) ^ $s1) & 0xFFFFFFFF;
        $f2 = ($s1 + $r1 ^ $r2) & 0xFFFFFFFF;

        $tt = $r1;
        if (($r1 & 0x01) != 0) {
            $r1 = ($r2 + ($s4 ^ $s1)) & 0xFFFFFFFF;
        } else {
            $r1 = ($r2 + $s4) & 0xFFFFFFFF;
        }
        $r2 = $this->rotl32(($tt * 0x54655307) & 0xFFFFFFFF, 7);
        $v3 = $s3;
        $s3 = ((($this->shl32($s3, 8)) ^ self::$alphaMulTable[($s3 >> 24) & 0xFF]) ^ 
               (($s6 >> 8) ^ self::$alphaDivTable[$s6 & 0xFF]) ^ $s2) & 0xFFFFFFFF;
        $f3 = ($s2 + $r1 ^ $r2) & 0xFFFFFFFF;

        $f4 = $f0;
        $f0 &= $f2;
        $f0 ^= $f3;
        $f2 ^= $f1;
        $f2 ^= $f0;
        $f3 |= $f4;
        $f3 ^= $f1;
        $f4 ^= $f2;
        $f1 = $f3;
        $f3 |= $f4;
        $f3 ^= $f0;
        $f0 &= $f1;
        $f4 ^= $f0;
        $f1 ^= $f3;
        $f1 ^= $f4;
        $f4 = (~$f4) & 0xFFFFFFFF;

        $sboxRes = [($f2 ^ $v0) & 0xFFFFFFFF, ($f3 ^ $v1) & 0xFFFFFFFF, 
                    ($f1 ^ $v2) & 0xFFFFFFFF, ($f4 ^ $v3) & 0xFFFFFFFF];
        $this->writeU32vLe($this->output, $sboxRes, 0);

        $tt = $r1;
        if (($r1 & 0x01) != 0) {
            $r1 = ($r2 + ($s5 ^ $s2)) & 0xFFFFFFFF;
        } else {
            $r1 = ($r2 + $s5) & 0xFFFFFFFF;
        }
        $r2 = $this->rotl32(($tt * 0x54655307) & 0xFFFFFFFF, 7);
        $v0 = $s4;
        $s4 = ((($this->shl32($s4, 8)) ^ self::$alphaMulTable[($s4 >> 24) & 0xFF]) ^ 
               (($s7 >> 8) ^ self::$alphaDivTable[$s7 & 0xFF]) ^ $s3) & 0xFFFFFFFF;
        $f0 = ($s3 + $r1 ^ $r2) & 0xFFFFFFFF;

        $tt = $r1;
        if (($r1 & 0x01) != 0) {
            $r1 = ($r2 + ($s6 ^ $s3)) & 0xFFFFFFFF;
        } else {
            $r1 = ($r2 + $s6) & 0xFFFFFFFF;
        }
        $r2 = $this->rotl32(($tt * 0x54655307) & 0xFFFFFFFF, 7);
        $v1 = $s5;
        $s5 = ((($this->shl32($s5, 8)) ^ self::$alphaMulTable[($s5 >> 24) & 0xFF]) ^ 
               (($s8 >> 8) ^ self::$alphaDivTable[$s8 & 0xFF]) ^ $s4) & 0xFFFFFFFF;
        $f1 = ($s4 + $r1 ^ $r2) & 0xFFFFFFFF;

        $tt = $r1;
        if (($r1 & 0x01) != 0) {
            $r1 = ($r2 + ($s7 ^ $s4)) & 0xFFFFFFFF;
        } else {
            $r1 = ($r2 + $s7) & 0xFFFFFFFF;
        }
        $r2 = $this->rotl32(($tt * 0x54655307) & 0xFFFFFFFF, 7);
        $v2 = $s6;
        $s6 = ((($this->shl32($s6, 8)) ^ self::$alphaMulTable[($s6 >> 24) & 0xFF]) ^ 
               (($s9 >> 8) ^ self::$alphaDivTable[$s9 & 0xFF]) ^ $s5) & 0xFFFFFFFF;
        $f2 = ($s5 + $r1 ^ $r2) & 0xFFFFFFFF;

        $tt = $r1;
        if (($r1 & 0x01) != 0) {
            $r1 = ($r2 + ($s8 ^ $s5)) & 0xFFFFFFFF;
        } else {
            $r1 = ($r2 + $s8) & 0xFFFFFFFF;
        }
        $r2 = $this->rotl32(($tt * 0x54655307) & 0xFFFFFFFF, 7);
        $v3 = $s7;
        $s7 = ((($this->shl32($s7, 8)) ^ self::$alphaMulTable[($s7 >> 24) & 0xFF]) ^ 
               (($s0 >> 8) ^ self::$alphaDivTable[$s0 & 0xFF]) ^ $s6) & 0xFFFFFFFF;
        $f3 = ($s6 + $r1 ^ $r2) & 0xFFFFFFFF;

        $f4 = $f0;
        $f0 &= $f2;
        $f0 ^= $f3;
        $f2 ^= $f1;
        $f2 ^= $f0;
        $f3 |= $f4;
        $f3 ^= $f1;
        $f4 ^= $f2;
        $f1 = $f3;
        $f3 |= $f4;
        $f3 ^= $f0;
        $f0 &= $f1;
        $f4 ^= $f0;
        $f1 ^= $f3;
        $f1 ^= $f4;
        $f4 = (~$f4) & 0xFFFFFFFF;

        $sboxRes = [($f2 ^ $v0) & 0xFFFFFFFF, ($f3 ^ $v1) & 0xFFFFFFFF, 
                    ($f1 ^ $v2) & 0xFFFFFFFF, ($f4 ^ $v3) & 0xFFFFFFFF];
        $this->writeU32vLe($this->output, $sboxRes, 16);

        $tt = $r1;
        if (($r1 & 0x01) != 0) {
            $r1 = ($r2 + ($s9 ^ $s6)) & 0xFFFFFFFF;
        } else {
            $r1 = ($r2 + $s9) & 0xFFFFFFFF;
        }
        $r2 = $this->rotl32(($tt * 0x54655307) & 0xFFFFFFFF, 7);
        $v0 = $s8;
        $s8 = ((($this->shl32($s8, 8)) ^ self::$alphaMulTable[($s8 >> 24) & 0xFF]) ^ 
               (($s1 >> 8) ^ self::$alphaDivTable[$s1 & 0xFF]) ^ $s7) & 0xFFFFFFFF;
        $f0 = ($s7 + $r1 ^ $r2) & 0xFFFFFFFF;

        $tt = $r1;
        if (($r1 & 0x01) != 0) {
            $r1 = ($r2 + ($s0 ^ $s7)) & 0xFFFFFFFF;
        } else {
            $r1 = ($r2 + $s0) & 0xFFFFFFFF;
        }
        $r2 = $this->rotl32(($tt * 0x54655307) & 0xFFFFFFFF, 7);
        $v1 = $s9;
        $s9 = ((($this->shl32($s9, 8)) ^ self::$alphaMulTable[($s9 >> 24) & 0xFF]) ^ 
               (($s2 >> 8) ^ self::$alphaDivTable[$s2 & 0xFF]) ^ $s8) & 0xFFFFFFFF;
        $f1 = ($s8 + $r1 ^ $r2) & 0xFFFFFFFF;

        $tt = $r1;
        if (($r1 & 0x01) != 0) {
            $r1 = ($r2 + ($s1 ^ $s8)) & 0xFFFFFFFF;
        } else {
            $r1 = ($r2 + $s1) & 0xFFFFFFFF;
        }
        $r2 = $this->rotl32(($tt * 0x54655307) & 0xFFFFFFFF, 7);
        $v2 = $s0;
        $s0 = ((($this->shl32($s0, 8)) ^ self::$alphaMulTable[($s0 >> 24) & 0xFF]) ^ 
               (($s3 >> 8) ^ self::$alphaDivTable[$s3 & 0xFF]) ^ $s9) & 0xFFFFFFFF;
        $f2 = ($s9 + $r1 ^ $r2) & 0xFFFFFFFF;

        $tt = $r1;
        if (($r1 & 0x01) != 0) {
            $r1 = ($r2 + ($s2 ^ $s9)) & 0xFFFFFFFF;
        } else {
            $r1 = ($r2 + $s2) & 0xFFFFFFFF;
        }
        $r2 = $this->rotl32(($tt * 0x54655307) & 0xFFFFFFFF, 7);
        $v3 = $s1;
        $s1 = ((($this->shl32($s1, 8)) ^ self::$alphaMulTable[($s1 >> 24) & 0xFF]) ^ 
               (($s4 >> 8) ^ self::$alphaDivTable[$s4 & 0xFF]) ^ $s0) & 0xFFFFFFFF;
        $f3 = ($s0 + $r1 ^ $r2) & 0xFFFFFFFF;

        $f4 = $f0;
        $f0 &= $f2;
        $f0 ^= $f3;
        $f2 ^= $f1;
        $f2 ^= $f0;
        $f3 |= $f4;
        $f3 ^= $f1;
        $f4 ^= $f2;
        $f1 = $f3;
        $f3 |= $f4;
        $f3 ^= $f0;
        $f0 &= $f1;
        $f4 ^= $f0;
        $f1 ^= $f3;
        $f1 ^= $f4;
        $f4 = (~$f4) & 0xFFFFFFFF;

        $sboxRes = [($f2 ^ $v0) & 0xFFFFFFFF, ($f3 ^ $v1) & 0xFFFFFFFF, 
                    ($f1 ^ $v2) & 0xFFFFFFFF, ($f4 ^ $v3) & 0xFFFFFFFF];
        $this->writeU32vLe($this->output, $sboxRes, 32);

        $tt = $r1;
        if (($r1 & 0x01) != 0) {
            $r1 = ($r2 + ($s3 ^ $s0)) & 0xFFFFFFFF;
        } else {
            $r1 = ($r2 + $s3) & 0xFFFFFFFF;
        }
        $r2 = $this->rotl32(($tt * 0x54655307) & 0xFFFFFFFF, 7);
        $v0 = $s2;
        $s2 = ((($this->shl32($s2, 8)) ^ self::$alphaMulTable[($s2 >> 24) & 0xFF]) ^ 
               (($s5 >> 8) ^ self::$alphaDivTable[$s5 & 0xFF]) ^ $s1) & 0xFFFFFFFF;
        $f0 = ($s1 + $r1 ^ $r2) & 0xFFFFFFFF;

        $tt = $r1;
        if (($r1 & 0x01) != 0) {
            $r1 = ($r2 + ($s4 ^ $s1)) & 0xFFFFFFFF;
        } else {
            $r1 = ($r2 + $s4) & 0xFFFFFFFF;
        }
        $r2 = $this->rotl32(($tt * 0x54655307) & 0xFFFFFFFF, 7);
        $v1 = $s3;
        $s3 = ((($this->shl32($s3, 8)) ^ self::$alphaMulTable[($s3 >> 24) & 0xFF]) ^ 
               (($s6 >> 8) ^ self::$alphaDivTable[$s6 & 0xFF]) ^ $s2) & 0xFFFFFFFF;
        $f1 = ($s2 + $r1 ^ $r2) & 0xFFFFFFFF;

        $tt = $r1;
        if (($r1 & 0x01) != 0) {
            $r1 = ($r2 + ($s5 ^ $s2)) & 0xFFFFFFFF;
        } else {
            $r1 = ($r2 + $s5) & 0xFFFFFFFF;
        }
        $r2 = $this->rotl32(($tt * 0x54655307) & 0xFFFFFFFF, 7);
        $v2 = $s4;
        $s4 = ((($this->shl32($s4, 8)) ^ self::$alphaMulTable[($s4 >> 24) & 0xFF]) ^ 
               (($s7 >> 8) ^ self::$alphaDivTable[$s7 & 0xFF]) ^ $s3) & 0xFFFFFFFF;
        $f2 = ($s3 + $r1 ^ $r2) & 0xFFFFFFFF;

        $tt = $r1;
        if (($r1 & 0x01) != 0) {
            $r1 = ($r2 + ($s6 ^ $s3)) & 0xFFFFFFFF;
        } else {
            $r1 = ($r2 + $s6) & 0xFFFFFFFF;
        }
        $r2 = $this->rotl32(($tt * 0x54655307) & 0xFFFFFFFF, 7);
        $v3 = $s5;
        $s5 = ((($this->shl32($s5, 8)) ^ self::$alphaMulTable[($s5 >> 24) & 0xFF]) ^ 
               (($s8 >> 8) ^ self::$alphaDivTable[$s8 & 0xFF]) ^ $s4) & 0xFFFFFFFF;
        $f3 = ($s4 + $r1 ^ $r2) & 0xFFFFFFFF;

        $f4 = $f0;
        $f0 &= $f2;
        $f0 ^= $f3;
        $f2 ^= $f1;
        $f2 ^= $f0;
        $f3 |= $f4;
        $f3 ^= $f1;
        $f4 ^= $f2;
        $f1 = $f3;
        $f3 |= $f4;
        $f3 ^= $f0;
        $f0 &= $f1;
        $f4 ^= $f0;
        $f1 ^= $f3;
        $f1 ^= $f4;
        $f4 = (~$f4) & 0xFFFFFFFF;

        $sboxRes = [($f2 ^ $v0) & 0xFFFFFFFF, ($f3 ^ $v1) & 0xFFFFFFFF, 
                    ($f1 ^ $v2) & 0xFFFFFFFF, ($f4 ^ $v3) & 0xFFFFFFFF];
        $this->writeU32vLe($this->output, $sboxRes, 48);

        $tt = $r1;
        if (($r1 & 0x01) != 0) {
            $r1 = ($r2 + ($s7 ^ $s4)) & 0xFFFFFFFF;
        } else {
            $r1 = ($r2 + $s7) & 0xFFFFFFFF;
        }
        $r2 = $this->rotl32(($tt * 0x54655307) & 0xFFFFFFFF, 7);
        $v0 = $s6;
        $s6 = ((($this->shl32($s6, 8)) ^ self::$alphaMulTable[($s6 >> 24) & 0xFF]) ^ 
               (($s9 >> 8) ^ self::$alphaDivTable[$s9 & 0xFF]) ^ $s5) & 0xFFFFFFFF;
        $f0 = ($s5 + $r1 ^ $r2) & 0xFFFFFFFF;

        $tt = $r1;
        if (($r1 & 0x01) != 0) {
            $r1 = ($r2 + ($s8 ^ $s5)) & 0xFFFFFFFF;
        } else {
            $r1 = ($r2 + $s8) & 0xFFFFFFFF;
        }
        $r2 = $this->rotl32(($tt * 0x54655307) & 0xFFFFFFFF, 7);
        $v1 = $s7;
        $s7 = ((($this->shl32($s7, 8)) ^ self::$alphaMulTable[($s7 >> 24) & 0xFF]) ^ 
               (($s0 >> 8) ^ self::$alphaDivTable[$s0 & 0xFF]) ^ $s6) & 0xFFFFFFFF;
        $f1 = ($s6 + $r1 ^ $r2) & 0xFFFFFFFF;

        $tt = $r1;
        if (($r1 & 0x01) != 0) {
            $r1 = ($r2 + ($s9 ^ $s6)) & 0xFFFFFFFF;
        } else {
            $r1 = ($r2 + $s9) & 0xFFFFFFFF;
        }
        $r2 = $this->rotl32(($tt * 0x54655307) & 0xFFFFFFFF, 7);
        $v2 = $s8;
        $s8 = ((($this->shl32($s8, 8)) ^ self::$alphaMulTable[($s8 >> 24) & 0xFF]) ^ 
               (($s1 >> 8) ^ self::$alphaDivTable[$s1 & 0xFF]) ^ $s7) & 0xFFFFFFFF;
        $f2 = ($s7 + $r1 ^ $r2) & 0xFFFFFFFF;

        $tt = $r1;
        if (($r1 & 0x01) != 0) {
            $r1 = ($r2 + ($s0 ^ $s7)) & 0xFFFFFFFF;
        } else {
            $r1 = ($r2 + $s0) & 0xFFFFFFFF;
        }
        $r2 = $this->rotl32(($tt * 0x54655307) & 0xFFFFFFFF, 7);
        $v3 = $s9;
        $s9 = ((($this->shl32($s9, 8)) ^ self::$alphaMulTable[($s9 >> 24) & 0xFF]) ^ 
               (($s2 >> 8) ^ self::$alphaDivTable[$s2 & 0xFF]) ^ $s8) & 0xFFFFFFFF;
        $f3 = ($s8 + $r1 ^ $r2) & 0xFFFFFFFF;

        $f4 = $f0;
        $f0 &= $f2;
        $f0 ^= $f3;
        $f2 ^= $f1;
        $f2 ^= $f0;
        $f3 |= $f4;
        $f3 ^= $f1;
        $f4 ^= $f2;
        $f1 = $f3;
        $f3 |= $f4;
        $f3 ^= $f0;
        $f0 &= $f1;
        $f4 ^= $f0;
        $f1 ^= $f3;
        $f1 ^= $f4;
        $f4 = (~$f4) & 0xFFFFFFFF;

        $sboxRes = [($f2 ^ $v0) & 0xFFFFFFFF, ($f3 ^ $v1) & 0xFFFFFFFF, 
                    ($f1 ^ $v2) & 0xFFFFFFFF, ($f4 ^ $v3) & 0xFFFFFFFF];
        $this->writeU32vLe($this->output, $sboxRes, 64);

        $this->lfsr[0] = $s0 & 0xFFFFFFFF;
        $this->lfsr[1] = $s1 & 0xFFFFFFFF;
        $this->lfsr[2] = $s2 & 0xFFFFFFFF;
        $this->lfsr[3] = $s3 & 0xFFFFFFFF;
        $this->lfsr[4] = $s4 & 0xFFFFFFFF;
        $this->lfsr[5] = $s5 & 0xFFFFFFFF;
        $this->lfsr[6] = $s6 & 0xFFFFFFFF;
        $this->lfsr[7] = $s7 & 0xFFFFFFFF;
        $this->lfsr[8] = $s8 & 0xFFFFFFFF;
        $this->lfsr[9] = $s9 & 0xFFFFFFFF;
        $this->fsmR[0] = $r1 & 0xFFFFFFFF;
        $this->fsmR[1] = $r2 & 0xFFFFFFFF;
        $this->offset = 0;
    }

    private function next() {
        if ($this->offset >= 80) {
            $this->advanceState();
        }
        $ret = $this->output[$this->offset];
        $this->offset++;
        return $ret;
    }

    public function process($input) {
        $inputBytes = array_values(unpack('C*', $input));
        $inputLen = strlen($input);
        $outputBytes = array_fill(0, $inputLen, 0);
        
        for ($i = 0; $i < $inputLen; $i++) {
            $outputBytes[$i] = $inputBytes[$i] ^ $this->next();
        }
        
        return pack('C*', ...$outputBytes);
    }
}
?>
