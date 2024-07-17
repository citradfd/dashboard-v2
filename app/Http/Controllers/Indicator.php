<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Indicator extends Controller
{
    public function index(){
        $param = [
            'title' => 'Indicator'
        ];

        return view('indicator/indicator',$param);
    }

    public function getdata(){
        $data = DB::table('tbl_indicator')
        ->select('tbl_indicator.idindicator','objectivename','indicatorname')
        ->leftjoin('tbl_objective','tbl_indicator.idobjective','tbl_objective.idobjective')
        ->get();
        return response()->json($data);
    }

    public function getobjective(){
        $data = DB::table('tbl_objective')->select('*')->get();
        return response()->json($data);
    }

    public function add(){
        $param = [
            'title' => 'Indicator',
        ];

        return view('indicator/indicatorAdd',$param);
    }

    public function savedata(Request $request){
        $validator = Validator::make($request->all(), [ 
            'indicatorname' => 'required|min:2|max:200',
            'idobjective' => 'numeric|min:1|max:200',  
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422); 
        }

        $data = DB::table('tbl_indicator')->insert([
            'indicatorname'   => $request->indicatorname,
            'idobjective'   => $request->idobjective,
        ]);
    }

    public function edit($idindicator){
        $param = [
            'title' => 'Indicator',
            'idindicator'   => $idindicator,
        ];

        return view('indicator/indicatorUpdate',$param);
    }

    public function getdataupdate($idindicator){
        $data = DB::table('tbl_indicator')->where('tbl_indicator.idindicator', $idindicator)->first();
        return response()->json($data);
    }

    public function updatedata(Request $request, $idindicator){
        $validator = Validator::make($request->all(), [ 
            'indicatorname' => 'required|min:2|max:200',
            'idobjective' => 'numeric|min:1|max:200',  
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422); 
        }

        $data = DB::table('tbl_indicator')->where('tbl_indicator.idindicator',$idindicator)->update([
            'indicatorname'   => $request->indicatorname,
            'idobjective'   => $request->idobjective,
        ]);
    }

    public function hapusdata($idindicator){
        $data = DB::table('tbl_indicator')->where('tbl_indicator.idindicator',$idindicator)->delete(); 
    }
}
