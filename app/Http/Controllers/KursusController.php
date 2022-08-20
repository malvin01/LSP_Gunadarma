<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kursus;
use App\Http\Requests\Store\StoreKursusRequest;
use App\Http\Requests\Update\UpdateKursusRequest;

class KursusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(auth()->user()->role != 'admin', 403);

        $kursus = Kursus::paginate(10);
        return view('kursus.index', compact('kursus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(auth()->user()->role != 'admin', 403);

        return view('kursus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKursusRequest $request)
    {
        abort_if(auth()->user()->role != 'admin', 403);

        Kursus::create($request->validated());

        return redirect(route('kursus.index'))->with('message', 'Kursus berhasil ditambah!!');;
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

        $kursus = Kursus::findOrFail($id);

        return view('kursus.edit', compact('kursus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKursusRequest $request, $id)
    {
        abort_if(auth()->user()->role != 'admin', 403);

        $kursus = Kursus::findOrFail($id);

        $kursus->update($request->validated());

        return redirect(route('kursus.edit', $id))->with('message', 'Kursus berhasil diubah!!');;
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

        $kursus = Kursus::findOrFail($id);

        $kursus->delete();

        return redirect()->back()->with('message', 'Kursus berhasil dihapus!!');;
    }
}
