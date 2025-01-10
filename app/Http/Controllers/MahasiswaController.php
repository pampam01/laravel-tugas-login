<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use \App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return  \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $data['mahasiswa'] = Mahasiswa::orderBy('created_at', 'asc')->paginate(2);
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

        $mahasiswa = new Mahasiswa();
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
        $data['mahasiswa'] = Mahasiswa::findOrFail($id);
        $data['list_mahasiswa'] = ['IT', 'SI', 'SK'];
        return view('mahasiswa_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $request->validate([
            'nim'=>'required',
            'nama'=>'required',
            'email'=>'required',
            'jurusan'=>'required',
            'nomor_hp'=>'required',
        ]);
        
        $mahasiswa = Mahasiswa::findOrFail($id);

        $mahasiswa->nim = $request->nim;
        $mahasiswa->nama = $request->nama;
        $mahasiswa->email = $request->email;
        $mahasiswa->jurusan = $request->jurusan;
        $mahasiswa->nomor_hp = $request->nomor_hp;

        $mahasiswa->save();
        return redirect()->route('mahasiswa.index')->with('success', 'Data Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {        
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')->with('success', 'Data Berhasil dihapus');
    }

    public function print(){
        $data['mahasiswa'] = Mahasiswa::all();
        $data['judul'] = 'Data Mahasiswa';
        return view('mahasiswa_print', $data);
    }

   
}
