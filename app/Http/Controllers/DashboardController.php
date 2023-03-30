<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Http\Controllers\EncryptionController;

class DashboardController extends Controller
{
    public function index()
    {
        // Decrypt the nisn
        $encryptionController = new EncryptionController(); // Define an instance of EncryptionController
        $nisn = User::where('id', Auth::user()->id)->first()->nisn; //mengambil nisn dari database
        $nisn = $encryptionController->rsa_decrypt(Auth::user()->$nisn, 17, 19, 7); //mengenkripsi nisn

        return view('dashboard.index', [
            'nisn' => $nisn
        ]);
    }
}
