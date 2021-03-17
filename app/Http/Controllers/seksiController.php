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
use App\kantor;
use App\pegawai;
use App\role;
use App\suratkeluar;
use App\suratmasuk;
use App\disposisi;

class seksiController extends Controller
{
    public function index(){
        $updated = date('d/m/Y');
        $disposisi = disposisi::select('suratmasuk.*')->join('suratmasuk','disposisi.suratmasuk_id','=','suratmasuk.id')->join('pegawai','disposisi.id_tujuan','=','pegawai.pegawai_id')->where('pegawai.pegawai_id', Session::get('pegawai_id'))->count();

        return view('seksi.index', ['updated' => $updated, 'disposisi' => $disposisi]);
    }

    public function ubahprofil($id){
    	$datane = pegawai::find($id);

    	return view('seksi.ubahprofil')->with(['datane' => $datane]);
    }

    public function ubahprofilGo(Request $req, $id){
    	if($req->file('file')){
    	  $foto = $req->file('file');
    	  $datane = pegawai::find($id);
    	  File::delete('../public/assets/images/fotoprofil/'.$datane->foto_dir);
          
          $namaBaru = 'Foto-Profil-'.$datane->pegawai_id.'-'.$datane->nama.'.'.$foto->getClientOriginalExtension();
          $foto->move('../public/assets/images/fotoprofil/', $namaBaru);
          Session::forget('foto_dir');
          Session::put('foto_dir', $namaBaru);

          if($req->password != NULL){
            $cek = pegawai::where('id', $id)->update([
                 "nip" => $req->nip,
                 "password" => md5($req->password),
                 "foto_dir" => $namaBaru,
                 "gelar_dpn" => $req->gelar_dpn,
                 "nama" => $req->nama,
                 "gelar_blkng" => $req->gelar_blkng,
                 "email" => $req->email,
                 "hp" => $req->hp,
                 "alamat" => $req->alamat
             ]);
          }else{
            $cek = pegawai::where('id', $id)->update([
                 "nip" => $req->nip,
                 "foto_dir" => $namaBaru,
                 "gelar_dpn" => $req->gelar_dpn,
                 "nama" => $req->nama,
                 "gelar_blkng" => $req->gelar_blkng,
                 "email" => $req->email,
                 "hp" => $req->hp,
                 "alamat" => $req->alamat
             ]);
          }

    	  if($cek == TRUE){
    	  	return back()->with('success-msg', 'Data berhasil diubah dan Foto telah diganti.');
    	  }else{
    	  	return back()->with('error-msg', 'Data gagal diubah dan Foto dikembalikan.');
    	  }
    	}else{
          if($req->password != NULL){
            $cek = pegawai::where('id', $id)->update([
                 "nip" => $req->nip,
                 "password" => md5($req->password),
                 "gelar_dpn" => $req->gelar_dpn,
                 "nama" => $req->nama,
                 "gelar_blkng" => $req->gelar_blkng,
                 "email" => $req->email,
                 "hp" => $req->hp,
                 "alamat" => $req->alamat
             ]);
          }else{
            $cek = pegawai::where('id', $id)->update([
                 "nip" => $req->nip,
                 "gelar_dpn" => $req->gelar_dpn,
                 "nama" => $req->nama,
                 "gelar_blkng" => $req->gelar_blkng,
                 "email" => $req->email,
                 "hp" => $req->hp,
                 "alamat" => $req->alamat
             ]);
          }
    	  
    	  if($cek == TRUE){
    	  	return back()->with('success-msg', 'Data berhasil diubah.');
    	  }else{
    	  	return back()->with('error-msg', 'Data gagal diubah.');
    	  }
    	}
    }
}
