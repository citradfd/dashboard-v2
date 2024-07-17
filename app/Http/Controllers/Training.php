<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Training extends Controller
{
    public function index(){
        $param = [
            'title' => 'Training'
        ];

        return view('training/training',$param);
    }

    public function getdata(){
        $data = DB::table('tbl_training')
        ->select('tbl_training.id','tbl_trainingsubjek.subjeck','materi','jam','pemateri','keterangan','file')
        ->leftjoin('tbl_trainingsubjek','tbl_training.idsubjek','tbl_trainingsubjek.id')
        ->get();
             

        return response()->json($data);
    }

    public function add(){
        $param = [
            'title' => 'Training',
        ];

        return view('training.trainingAdd', $param);
    }

    public function getsubjek(){
        $data = DB::table('tbl_trainingsubjek')
                ->select('*')->get();
        return response()->json($data);
    }

    public function savedata(Request $request){
        $validator = Validator::make($request->all(), [ 
            'idsubjek' => 'required|min:1|max:100',
            'materi' => 'required|min:2|max:200',
            'jam' => 'numeric|min:0|max:200',
            'pemateri' => 'required|min:2|max:200',  
            'keterangan' => 'required|min:2|max:250',

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422); 
        }
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('sertifikat', $fileName, 'public');


        $data = DB::table('tbl_training')->insert([
            'idsubjek'   => $request->idsubjek,
            'materi'   => $request->materi,
            'jam'   => $request->jam,
            'pemateri'   => $request->pemateri,
            'keterangan'   => $request->keterangan,
            'file'          => $fileName,
        ]);
        }
    }

    public function edit($id){
        $param = [
            'title' => 'Training',
            'id'    => $id,
        ];

        return view('training.trainingUpdate', $param);
    }

    public function getdataupdate($id){
        $data = DB::table('tbl_training')->where('tbl_training.id', $id)->first();
        return response()->json($data);
    }

    public function updatedata(Request $request, $id){
        $validator = Validator::make($request->all(), [ 
            'idsubjek' => 'required|min:1|max:100',
            'materi' => 'required|min:2|max:200',
            'jam' => 'numeric|min:0|max:200',
            'pemateri' => 'required|min:2|max:200',  
            'keterangan' => 'required|min:2|max:250',

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422); 
        }
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('sertifikat', $fileName, 'public');


        $data = DB::table('tbl_training')->where('tbl_training.id',$id)->update([
            'idsubjek'   => $request->idsubjek,
            'materi'   => $request->materi,
            'jam'   => $request->jam,
            'pemateri'   => $request->pemateri,
            'keterangan'   => $request->keterangan,
            'file'          => $fileName,
        ]);
    }
    }

    public function delete($id){
        $data = DB::table('tbl_training')->where('tbl_training.id',$id)->delete(); 
    }

}
