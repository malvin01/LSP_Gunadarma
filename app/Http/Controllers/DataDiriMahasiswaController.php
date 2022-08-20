<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DataDiriMahasiswaController extends Controller
{
    public function index()
    {
        return view('data-diri-mahasiswa.index');
    }

    public function uploadKrs(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id_user);

        $user->addMediaFromRequest('krs')
        ->toMediaCollection('krs');

    }
}
