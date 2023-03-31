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
        $encryptionController = new EncryptionController(); // Define an instance of EncryptionController
        $nisn = User::where('id', Auth::user()->id)->first()->nisn; //mengambil nisn dari database

        // Decrypt nisn
        $keys = $encryptionController->generateRSAKeys(100, 1000);
        $nisn = $encryptionController->decryptRSA($nisn, $keys['private']); //mendecrypt nisn

        return view('dashboard.index', [
            'nisn' => $nisn
        ]);
    }
}
