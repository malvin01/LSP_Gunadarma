<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kursus;
use App\Models\Jadwal;

class ListKursusController extends Controller
{
    public function index()
    {
        abort_if(auth()->user()->role != 'mahasiswa', 403);

        $kursus = Kursus::paginate(10);
        return view('list-kursus.index', compact('kursus'));
    }

    public function jadwal($id)
    {
        abort_if(auth()->user()->role != 'mahasiswa', 403);

        $jadwal = Jadwal::where('id_kursus', $id)->paginate(10);

        return view('list-kursus.jadwal', compact('jadwal'));
    }

    public function detailJadwal($id, $jadwalId)
    {
        abort_if(auth()->user()->role != 'mahasiswa', 403);
    }
}
