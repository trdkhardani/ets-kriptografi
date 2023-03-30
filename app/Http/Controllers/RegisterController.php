<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

use App\Http\Controllers\EncryptionController;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate(
            [
                'name' => 'required|max:255|',
                'email' => 'required|unique:users',
                'nisn' => 'required|numeric',
                'password' => 'required|min:5|max:255'
            ]
        );

        $validatedData['password'] = Hash::make($validatedData['password']); //mengenkripsi password

        $encryptionController = new EncryptionController(); // Define an instance of EncryptionController
        $validatedData['nisn'] = $encryptionController->rsa_encrypt($validatedData['nisn'], 17, 19, 7); //mengenkripsi nisn

        User::create($validatedData);

        // $request->session()->flash('success', 'Registration Success! Login Now!'); //membuat session flash

        return redirect('/')->with('success', 'Registrasi Berhasil!');
    }

    public function rsa()
    {
        $p = 17;
        $q = 19;
        $e = 7;

        $msg = "007007007007";
        $encryptionController = new EncryptionController(); // Define an instance of EncryptionController

        // call the rsa_encrypt method on the instance
        $ciphertext = $encryptionController->rsa_encrypt($msg, $p, $q, $e);
        echo "Encrypted message: $ciphertext\n";

        // call the rsa_decrypt method on the instance
        $plaintext = $encryptionController->rsa_decrypt($ciphertext, $p, $q, $e);
        echo "Decrypted message: $plaintext\n";
    }
}
