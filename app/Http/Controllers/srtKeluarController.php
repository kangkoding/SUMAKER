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
use PDF;


class srtKeluarController extends Controller
{
        public function index(){
    	$counter = counter::select('*')->where('counter_kd', 'ASKB')->orWhere('counter_kd', 'ASKT')->get();

    	return view('suratkeluar.index', ['daftarAgenda' => $counter]);
    }

    public function ambilCounter($id){
    	$datane = counter::select('nilai')->where('counter_kd', $id)->get();
    	return response()->json($datane);
    }

    public function create(Request $req){
    	$tabel = new \App\suratkeluar;

    	if($req->file('file')){
	    	$lampirane = $req->file('file');
            $namaBaru = 'LampiranSuratKeluar'.$req->nmr_agenda.''.str_replace('/', '', $req->nmr_surat).''.date('Ymd', strtotime($req->tgl_diterima)).'.'.$lampirane->getClientOriginalExtension();

	    	$lampirane->move(storage_path('app/suratkeluar/'), $namaBaru);
    	}else{
    		$namaBaru = NULL;
    	}

    	$tabel->suratkeluar_id = Str::uuid();
    	$tabel->nmr_surat = $req->nmr_surat;
    	$tabel->tgl_keluar = $req->tgl_keluar;
    	$tabel->tgl_surat = $req->tgl_surat;
    	$tabel->nmr_agenda = $req->nmr_agenda;
    	$tabel->jns_surat = $req->jns_surat;
    	$tabel->ringkasan = $req->ringkasan;
    	$tabel->lampiran = $namaBaru;

    	if($tabel->save()){
    		$updateCounter = counter::where('counter_kd', $req->jns_surat)->update(["nilai" => $req->nmr_agenda + 1]);

    		return back()->with('success-msg', 'Data berhasil disimpan.');
    	}else{
    		return back()->with('error-msg', 'Data gagal disimpan.');
    	}
    }

    public function update($id){
    	$datane = suratkeluar::find($id);

    	return view('suratkeluar.ubah')->with(['datane' => $datane]);
    }

    public function updateGo(Request $req, $id){
    	if($req->file('file')){
    	  $lampirane = $req->file('file');
    	  $datane = suratkeluar::find($id);
    	  File::delete(storage_path('app/suratkeluar/').$datane->lampiran);
    	  
    	  $namaBaru = 'LampiranSuratKeluar'.$req->nmr_agenda.''.str_replace('/', '', $req->nmr_surat).''.date('Ymd', strtotime($req->tgl_diterima)).'.'.$lampirane->getClientOriginalExtension();
          
    	  $lampirane->move(storage_path('app/suratkeluar/'), $namaBaru);

    	  $cek = suratkeluar::where('id', $id)->update([
    	       "nmr_surat" => $req->nmr_surat,
    	       "ringkasan" => $req->ringkasan,
    	       "lampiran" => $namaBaru,
    	       "tgl_surat" => date('Y-m-d', strtotime($req->tgl_surat)),
    	       "tgl_keluar" => date('Y-m-d', strtotime($req->tgl_keluar)),
    	       "tgl_surat" => date('Y-m-d', strtotime($req->tgl_surat))
    	   ]);
    	  if($cek == TRUE){
    	  	return back()->with('success-msg', 'Data berhasil diubah dan Lampiran telah diganti.');
    	  }else{
    	  	return back()->with('error-msg', 'Data gagal diubah dan Lampiran dikembalikan.');
    	  }
    	}else{
    	  $cek = suratkeluar::where('id', $id)->update([
    	       "nmr_surat" => $req->nmr_surat,
    	       "ringkasan" => $req->ringkasan,
    	       "tgl_surat" => date('Y-m-d', strtotime($req->tgl_surat)),
    	       "tgl_keluar" => date('Y-m-d', strtotime($req->tgl_penerimaan)),
    	       "tgl_surat" => date('Y-m-d', strtotime($req->tgl_surat))
    	   ]);
    	  if($cek == TRUE){
    	  	return back()->with('success-msg', 'Data berhasil diubah.');
    	  }else{
    	  	return back()->with('error-msg', 'Data gagal diubah.');
    	  }
    	}
    }

    public function delete($id){
    	$tabel = suratkeluar::find($id);

        if($tabel->delete($id)){
        	File::delete(storage_path('app/suratkeluar/').$tabel->lampiran);
        	return back()->with('success-msg', 'Data berhasil dihapus.');
        }else{
        	return back()->with('error-msg', 'Data gagal dihapus.');
        }

    }

    public function show(){
    	$datane = suratkeluar::all();
    	return view('suratkeluar.monitoring',['datane' => $datane]);
    }

    public function lampiran(){
        $count = DB::table('suratkeluar')->count();
    	$datane = suratkeluar::select('id','suratkeluar_id','lampiran')->whereNotNull('lampiran')->get();

    	return view('suratkeluar.lampiran',['datane' => $datane, 'count' => $count]);
    }

    public function lampiranDownload($id){
      $datane = suratkeluar::find($id);

      $lokasi = storage_path('app/suratkeluar/').$datane->lampiran;

      /*$header = ['Content-Type' => 'application/pdf',
                 'Content-Disposition' => 'attachment; filename="Pengumuman.pdf"',];*/
      $headers = array(
            'Content-Type: application/pdf',
            'Content-Transfer-Encoding:binary',
        );

      return response()->download($lokasi, $datane->lampiran_dir, $headers);
    }

    public function kirim($id){
    	$cek = suratkeluar::where('id', $id)->update([
    	     "tgl_dikirim" => date('Y-m-d')
    	 ]);

    	if($cek == TRUE){
    		return back()->with('success-msg', 'Data berhasil diubah.');
    	}else{
    		return back()->with('error-msg', 'Data gagal diubah.');
    	}
    }
}
