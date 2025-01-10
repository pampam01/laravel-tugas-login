<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function exportPdf()
    {
        // Ambil data mahasiswa dan judul untuk PDF
        $judul = 'Laporan Data Mahasiswa';
        $mahasiswa = Mahasiswa::all();

        // Load tampilan Blade dan buat PDF
        $pdf = Pdf::loadView('laporan_mahasiswa', compact('judul', 'mahasiswa'));

        // Download PDF dengan nama file yang diberikan
        return $pdf->download('laporan_data_mahasiswa.pdf');
    }
}
