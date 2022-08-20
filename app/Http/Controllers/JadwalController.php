<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\StoreJadwalRequest;
use App\Http\Requests\Update\UpdateJadwalRequest;
use App\Models\Jadwal;
use App\Models\Kursus;
use App\Models\KursusMahasiswa;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(auth()->user()->role != 'admin', 403);

        $jadwal = Jadwal::paginate(10);

        return view('jadwal.index', compact('jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(auth()->user()->role != 'admin', 403);

        $kursus = Kursus::all();

        return view('jadwal.create', compact('kursus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJadwalRequest $request)
    {
        abort_if(auth()->user()->role != 'admin', 403);

        Jadwal::create([
            'id_kursus' => $request->id_kursus,
            'waktu_kursus' => $request->waktu_kursus,
        ]);

        return redirect(route('jadwal.index'))->with('message', 'Jadwal berhasil ditambah!!');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(auth()->user()->role != 'admin', 403);

        $kursus = Kursus::all();

        $jadwal = Jadwal::findOrFail($id);

        return view('jadwal.edit', compact('kursus', 'jadwal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJadwalRequest $request, $id)
    {
        abort_if(auth()->user()->role != 'admin', 403);

        $jadwal = Jadwal::findOrFail($id);

        $jadwal->update($request->validated());

        return redirect(route('jadwal.edit', $id))->with('message', 'Jadwal berhasil diubah!!');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(auth()->user()->role != 'admin', 403);

        $jadwal = Jadwal::findOrFail($id);

        $jadwal->delete();

        return redirect()->back()->with('message', 'Jadwal berhasil dihapus!!');;
    }

    public function pendaftaran($id)
    {
        $pendaftaran = KursusMahasiswa::where('id_jadwal', $id)->paginate(10);

        return view('jadwal.pendaftaran', compact('pendaftaran'));
    }
}
