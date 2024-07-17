<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class pegawai extends Controller
{
        public function index(){
        $param = [
            'title' => 'Pegawai'
        ];

        return view('pegawai/pegawai',$param);
    }

    public function getdata(){
        $data = DB::table('pegawai')->select('*')->get();
        return response()->json($data);
    }

    public function add(){
        $param = [
            'title' => 'Add Data Pegawai',
        ];

        return view('pegawai/pegawaiAdd',$param);
    }
}
