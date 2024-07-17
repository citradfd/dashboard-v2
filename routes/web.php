<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Jabatan;
use App\Http\Controllers\Person;
use App\Http\Controllers\Penilaian;
use App\Http\Controllers\Training;
use App\Http\Controllers\Riwayat;
use App\Http\Controllers\Psikotes;
use App\Http\Controllers\Perspective;
use App\Http\Controllers\Objective;
use App\Http\Controllers\Indicator;
use App\Http\Controllers\Profile;
use App\Http\Controllers\RiwayatPendidikan;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SubjekTraining;
use App\Http\Controllers\TestController;
use App\Http\Controllers\pegawai;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [Dashboard::class,'index']);
Route::get('dashboard', [Dashboard::class,'index']);
Route::get('dashboard/getimage', [Dashboard::class,'getimage']);
Route::post('dashboard/form-session', [Dashboard::class,'submitForm'])->name('form.submit');

// Indicator start
Route::get('indicator',[Indicator::class,'index']);
Route::get('indicator/getdata',[Indicator::class,'getdata']);
Route::get('indicator/add',[Indicator::class,'add']);
Route::get('indicator/getobjective',[Indicator::class,'getobjective']);
Route::post('indicator/savedata',[Indicator::class,'savedata']);
Route::get('indicator/edit/{idindicator}',[Indicator::class,'edit']);
Route::get('indicator/getdataupdate/{idindicator}',[Indicator::class,'getdataupdate']);
Route::post('indicator/updatedata/{idindicator}',[Indicator::class,'updatedata']);
Route::delete('indicator/delete/{idindicator}',[Indicator::class,'hapusdata']);
// Indicator end

Route::get('pegawai',[pegawai::class,'index']);
Route::get('pegawai/getdata',[pegawai::class,'getdata']);
Route::get('pegawai/add',[pegawai::class,'add']);
Route::get('indicator/getobjective',[Indicator::class,'getobjective']);
Route::post('indicator/savedata',[Indicator::class,'savedata']);
Route::get('indicator/edit/{idindicator}',[Indicator::class,'edit']);
Route::get('indicator/getdataupdate/{idindicator}',[Indicator::class,'getdataupdate']);
Route::post('indicator/updatedata/{idindicator}',[Indicator::class,'updatedata']);
Route::delete('indicator/delete/{idindicator}',[Indicator::class,'hapusdata']);

Route::get('tes',[TestController::class,'test']);
Route::post('/saveselectperson',[SessionController::class,'saveSelectValue'])->name('saveSelectValue');

