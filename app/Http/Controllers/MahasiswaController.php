<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return  \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $data['mahasiswa'] = \App\Models\Mahasiswa::all();
        $data['judul'] = 'Data Dokter';
        return view('mahasiswa_index', $data);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['list_mahasiswa'] = ['IT', 'SI', 'SK'];
        return view("mahasiswa_create", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nim'=>'required', 
            'nama'=>'required', 
            'email'=>'required', 
            'jurusan'=>'required', 
            'nomor_hp'=>'required',
        ]);

        $mahasiswa = new \App\Models\Mahasiswa();
        $mahasiswa->nim = $request->nim;
        $mahasiswa->nama = $request->nama;
        $mahasiswa->email = $request->email;
        $mahasiswa->jurusan = $request->jurusan;
        $mahasiswa->nomor_hp = $request->nomor_hp;

        $mahasiswa->save();
        return redirect()->route('mahasiswa.index')->with('success', 'Data Berhasil ditambahkan');
    }
 

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
