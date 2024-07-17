<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Dashboard extends Controller
{
    public function index(){                 
        return view('dashboard');
    }

    public function submitForm(Request $request)
    {
        $category = $request->input('option');

        // Simpan nilai category ke session
        $request->session()->put('selected_category', $category);

        return redirect()->back()->with('status', 'Kategori telah dipilih!');
    }

    public function getimage($id){
         // Cari profil berdasarkan ID dari database (jika perlu)
        
        // Misalnya, Anda mengambil path dari folder public dengan format yang sesuai dengan idprofile
        $path = public_path("images/profile/{$id}.jpg");

        // Cek apakah file gambar ada
        if (file_exists($path)) {
            // Jika ada, kembalikan respons dengan file gambar
            return response()->file($path);
        }

        // Jika file tidak ditemukan, kembalikan respons default (misalnya placeholder gambar atau 404)
        abort(404);
    }


}
