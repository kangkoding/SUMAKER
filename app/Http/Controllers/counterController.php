<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

use App\counter;

class counterController extends Controller
{
    public function index(){
    	$datane = counter::all();

      return view('counter.index', ['datane' => $datane]);
    }

    public function reset($id){
       $datane = counter::where('id', $id)->update(["nilai" => 1]);

       if($datane){
        return back()->with('success-msg', 'Counter berhasil di reset.'); 
       }else{
        return back()->with('error-msg', 'Counter gagal di reset.');
      }
       
    }

    public function create(){
      return view('counter.buat');
    }

    public function createGo(Request $req){
      $tabel = new \App\counter;

      $tabel->counter_kd = $req->counter_kd;
      $tabel->keterangan = $req->keterangan;
      $tabel->nilai = 1;

      if($tabel->save()){
        return back()->with('success-msg', 'Data berhasil disimpan.');
      }else{
        return back()->with('error-msg', 'Data gagal disimpan.');
      }
    }

    public function delete($id){
      $tabel = counter::find($id);

        if($tabel->delete($id)){
          return back()->with('success-msg', 'Data berhasil dihapus.');
        }else{
          return back()->with('error-msg', 'Data gagal dihapus.');
        }
    }

    public function update($id){
      $datane = counter::find($id);

      return view('counter.ubah', ['datane' => $datane]);
    }

    public function updateGo(Request $req, $id){
      $cek = counter::where('id', $id)->update([
             "counter_kd" => $req->counter_kd,
             "keterangan" => $req->keterangan
         ]);

        if($cek == TRUE){
          return back()->with('success-msg', 'Data berhasil diubah.');
        }else{
          return back()->with('error-msg', 'Data gagal diubah.');
        }
    }

}
