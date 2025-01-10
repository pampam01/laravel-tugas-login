<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SignatureController extends Controller
{
    public function save(Request $request)
    {
        $signatureData = $request->input('signature');

        // Hilangkan bagian "data:image/png;base64,"
        $signature = str_replace('data:image/png;base64,', '', $signatureData);
        $signature = str_replace(' ', '+', $signature);
        $imageName = 'signatures/' . uniqid() . '.png';

        // Simpan gambar ke storage Laravel
        Storage::disk('public')->put($imageName, base64_decode($signature));

        return response()->json(['success' => true, 'image' => $imageName]);
    }
}
