<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\StoreMahasiswaRequest;
use App\Http\Requests\Update\UpdateMahasiswaRequest;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(auth()->user()->role != 'admin', 403);

        $mahasiswa = User::where('role', 'mahasiswa')->paginate(10);

        return view('mahasiswa.index', compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(auth()->user()->role != 'admin', 403);

        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMahasiswaRequest $request)
    {
        abort_if(auth()->user()->role != 'admin', 403);

        $user = User::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'nomor_telepon' => $request->nomor_telepon,
            'password' => Hash::make($request->password),
            'role' => 'mahasiswa'
        ]);

        $user->mahasiswa()->create([
            'npm' => $request->npm,
            'kelas' => $request->kelas
        ]);

        return redirect(route('mahasiswa.index'))->with('message', 'Mahasiswa berhasil ditambah!!');;
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

        $mahasiswa = User::where([
            'id_user' => $id,
            'role' => 'mahasiswa'
        ])->firstOrFail();

        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMahasiswaRequest $request, $id)
    {
        abort_if(auth()->user()->role != 'admin', 403);

        $mahasiswa = User::where([
            'id_user' => $id,
            'role' => 'mahasiswa'
        ])->firstOrFail();

        $mahasiswa->update($request->validated());

        return redirect(route('mahasiswa.edit', $id))->with('message', 'Mahasiswa berhasil diubah!!');;
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

        $mahasiswa = User::where([
            'id_user' => $id,
            'role' => 'mahasiswa'
        ])->firstOrFail();

        $mahasiswa->delete();

        return redirect()->back()->with('message', 'Mahasiswa berhasil dihapus!!');;
    }
}
