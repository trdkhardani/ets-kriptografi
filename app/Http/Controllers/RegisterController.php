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
                'nisn' => 'required|numeric|digits:10|unique:users',
                'password' => 'required|min:5|max:255'
            ]
        );

        $validatedData['password'] = Hash::make($validatedData['password']); //mengenkripsi password

        $encryptionController = new EncryptionController(); // Define an instance of EncryptionController
        $keys = $encryptionController->generateRSAKeys(100, 1000);
        $validatedData['nisn'] = $encryptionController->encryptRSA($validatedData['nisn'], $keys['public']);

        User::create($validatedData);

        // $request->session()->flash('success', 'Registration Success! Login Now!'); //membuat session flash

        return redirect('/')->with('success', 'Registrasi Berhasil!');
    }
}
