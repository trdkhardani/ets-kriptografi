<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EncryptionController extends Controller
{
    public function rsa_encrypt($msg, $p, $q, $e)
    {
        $n = $p * $q;
        $phi = ($p - 1) * ($q - 1);
        $msg = str_split($msg, 1);
        $ciphertext = "";
        foreach ($msg as $char) {
            $char_ascii = ord($char);
            $char_ciphertext = gmp_strval(gmp_pow($char_ascii, $e) % $n);
            $ciphertext .= str_pad($char_ciphertext, strlen($n) - 1, "0", STR_PAD_LEFT);
        }
        return $ciphertext;
    }

    public function rsa_decrypt($ciphertext, $p, $q, $e)
    {
        $n = $p * $q;
        $phi = ($p - 1) * ($q - 1);
        $ciphertext = str_split($ciphertext, strlen($n) - 1);
        $plaintext = "";
        foreach ($ciphertext as $char_ciphertext) {
            $char_ascii = gmp_strval(gmp_pow($char_ciphertext, $this->mod_inverse($e, $phi)) % $n);
            $plaintext .= chr($char_ascii);
        }
        return $plaintext;
    }

    public function mod_inverse($a, $n)
    {
        list($d, $x, $y) = $this->extended_gcd($a, $n);
        if ($d != 1) {
            return null;
        }
        return ($x % $n + $n) % $n;
    }

    public function extended_gcd($a, $b)
    {
        if ($a == 0) {
            return array($b, 0, 1);
        }
        list($gcd, $x1, $y1) = $this->extended_gcd($b % $a, $a);
        $x = $y1 - floor($b / $a) * $x1;
        $y = $x1;
        return array($gcd, $x, $y);
    }
}
