<?php

namespace App\Http\Controllers;


class EncryptionController extends Controller
{
    private $p = 7; // prime number p
    private $q = 11; // prime number q
    private $e = 17; // public exponent

    // Fungsi untuk menghasilkan kunci publik dan privat RSA
    public function generateRSAKeys()
    {
        $n = $this->p * $this->q;
        $phi = ($this->p - 1) * ($this->q - 1);
        $d = $this->modInverse($this->e, $phi);
        return array('public' => array('e' => $this->e, 'n' => $n), 'private' => array('d' => $d, 'n' => $n));
    }

    // Fungsi untuk mencari nilai modulo inverse
    public function modInverse($a, $m)
    {
        for ($x = 1; $x < $m; $x++) {
            if (($a * $x) % $m == 1) {
                return $x;
            }
        }
    }

    // Fungsi untuk melakukan enkripsi pesan
    public function encryptRSA($message, $publicKey)
    {
        $e = $publicKey['e'];
        $n = $publicKey['n'];
        $encryptedMessage = '';
        for ($i = 0; $i < strlen($message); $i++) {
            $m = ord($message[$i]);
            $c = bcpowmod($m, $e, $n);
            $encryptedMessage .= $c . ' ';
        }
        return trim($encryptedMessage);
    }

    // Fungsi untuk melakukan dekripsi pesan
    public function decryptRSA($encryptedMessage, $privateKey)
    {
        $d = $privateKey['d'];
        $n = $privateKey['n'];
        $decryptedMessage = '';
        $encryptedMessageArr = explode(' ', $encryptedMessage);
        foreach ($encryptedMessageArr as $c) {
            if ($c != '') {
                $m = bcpowmod($c, $d, $n);
                $decryptedMessage .= chr($m);
            }
        }
        return $decryptedMessage;
    }
}
