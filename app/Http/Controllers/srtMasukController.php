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

class srtMasukController extends Controller
{
    public function index(){
        $counter = counter::select('*')->where('counter_kd', 'ASMU')->orWhere('counter_kd', 'ASMD')->get();

        return view('suratmasuk.index', ['daftarAgenda' => $counter]);
    }

    public function ambilCounter($id){
        $datane = counter::select('nilai')->where('counter_kd', $id)->get();
        return response()->json($datane);
    }

    public function create(Request $req){
        $tabel = new \App\suratmasuk;

        if($req->file('file')){
            $lampirane = $req->file('file');
            $namaBaru = 'LampiranSuratMasuk'.$req->nmr_agenda.''.str_replace('/', '', $req->nmr_surat).''.date('Ymd', strtotime($req->tgl_diterima)).'.'.$lampirane->getClientOriginalExtension();
            $lampirane->move(storage_path('app/suratmasuk/'), $namaBaru);

        }else{
            $namaBaru = NULL;
        }

        if($req->tindaklanjut != NULL){
              $tindaklanjut = "(".Session::get('sebagai').") ".$req->tindaklanjut;
          }else{
              $tindaklanjut = "";
          }   

        $tabel->suratmasuk_id = Str::uuid();
        $tabel->nmr_surat = $req->nmr_surat;
        $tabel->tgl_diterima = $req->tgl_diterima.' '.date('H:i:s');
        $tabel->nmr_agenda = $req->nmr_agenda;
        $tabel->asal_surat = $req->asal_surat;
        $tabel->jns_surat = $req->jns_surat;
        $tabel->ringkasan = $req->ringkasan;
        $tabel->tkt_keamanan = $req->tkt_keamanan;
        $tabel->tgl_surat = date('Y-m-d', strtotime($req->tgl_surat));
        //$tabel->tgl_penyelesaian = NULL;
        $tabel->tindaklanjut = $tindaklanjut;   
        $tabel->lampiran = $namaBaru;

        if($tabel->save()){
            $idne = $tabel->id;

            $updateCounter = counter::where('counter_kd', $req->jns_surat)->update(["nilai" => $req->nmr_agenda + 1]);
            if($namaBaru == NULL){
                return back()->with('success-msg', 'Data berhasil disimpan.');
            }else{
                return redirect('/suratmasuk/disp/cetak/'.$idne);
            }
            //return back()->with('success-msg', 'Data berhasil disimpan.');
            //return view('suratmasuk.konfirmasi', ['idne' => $tabel->id ])->with('success-msg', 'Data berhasil disimpan.');
        }else{
            return back()->with('error-msg', 'Data gagal disimpan.');
        }
    }

    public function update($id){
        $datane = suratmasuk::find($id);

        return view('suratmasuk.ubah')->with(['datane' => $datane]);
    }

    public function updateGo(Request $req, $id){
        if($req->file('file')){
          $lampirane = $req->file('file');
          $datane = suratmasuk::find($id);
          File::delete(storage_path('app/suratmasuk/').$datane->lampiran);

          if($req->tindaklanjut != NULL){
              $tindaklanjut = "(".Session::get('sebagai').") ".$req->tindaklanjut;
          }else{
              $tindaklanjut = "";
          }       
          
          $namaBaru = 'LampiranSuratMasuk'.$req->nmr_agenda.''.str_replace('/', '', $req->nmr_surat).''.date('Ymd', strtotime($req->tgl_diterima)).'.'.$lampirane->getClientOriginalExtension();
          $lampirane->move(storage_path('app/suratmasuk/'), $namaBaru);

          $cek = suratmasuk::where('id', $id)->update([
               "nmr_surat" => $req->nmr_surat,
               "tkt_keamanan" => $req->tkt_keamanan,
               "ringkasan" => $req->ringkasan,
               "lampiran" => $namaBaru,
               "tindaklanjut" => $tindaklanjut,
               "tgl_diterima" => date('Y-m-d', strtotime($req->tgl_diterima)).' '.date('H:i:s'),
               "tgl_surat" => date('Y-m-d', strtotime($req->tgl_surat)),
               "asal_surat" => $req->asal_surat
           ]);
          if($cek == TRUE){
            return back()->with('success-msg', 'Data berhasil diubah dan Lampiran telah diganti.');
          }else{
            return back()->with('error-msg', 'Data gagal diubah dan Lampiran dikembalikan.');
          }
        }else{
          $cek = suratmasuk::where('id', $id)->update([
               "nmr_surat" => $req->nmr_surat,
               "tkt_keamanan" => $req->tkt_keamanan,
               "ringkasan" => $req->ringkasan,
               "tindaklanjut" => $tindaklanjut,
               "tgl_diterima" => date('Y-m-d', strtotime($req->tgl_diterima)).' '.date('H:i:s'),
               "tgl_surat" => date('Y-m-d', strtotime($req->tgl_surat)),
               "asal_surat" => $req->asal_surat
           ]);
          if($cek == TRUE){
            return back()->with('success-msg', 'Data berhasil diubah.');
          }else{
            return back()->with('error-msg', 'Data gagal diubah.');
          }
        }
    }

    public function updateTindakLanjut($id){
        $datane = suratmasuk::find($id);

        return view('suratmasuk.tindaklanjut')->with(['datane' => $datane]);
    }

    public function updateTindakLanjutGo(Request $req, $id){
        $cek = suratmasuk::where('id', $id)->update([
             "tindaklanjut" => "(".Session::get('sebagai').") ".$req->tindaklanjut
         ]);
        
          if($cek == TRUE){
            return back()->with('success-msg', 'Data berhasil diubah.');
          }else{
            return back()->with('error-msg', 'Data gagal diubah.');
          }
    }

    public function delete($id){
        $tabel = suratmasuk::find($id);

        if($tabel->delete($id)){
            File::delete(storage_path('app/suratmasuk/').$tabel->lampiran);
            return back()->with('success-msg', 'Data berhasil dihapus.');
        }else{
            return back()->with('error-msg', 'Data gagal dihapus.');
        }

    }

    public function show(){
        if(Session::get('role') == 'SEKSI' && Session::get('idne') != NULL){
            $datane = disposisi::select('suratmasuk.*')->join('suratmasuk','disposisi.suratmasuk_id','=','suratmasuk.id')->join('pegawai','disposisi.id_tujuan','=','pegawai.pegawai_id')->where('pegawai.pegawai_id', Session::get('pegawai_id'))->get();
        }else{
            $datane = suratmasuk::select('suratmasuk.*')->get();
        }
        
        return view('suratmasuk.monitoring',['datane' => $datane]);
    }

    public function lampiran(){
        if(Session::get('role') == 'SEKSI' && Session::get('idne') != NULL){
            $count = DB::table('suratmasuk')->count();
            $datane = disposisi::select('suratmasuk.*')->join('suratmasuk','disposisi.suratmasuk_id','=','suratmasuk.id')->join('pegawai','disposisi.id_tujuan','=','pegawai.pegawai_id')->where('pegawai.pegawai_id', Session::get('pegawai_id'))->whereNotNull('suratmasuk.lampiran')->get();
        }else{
            $count = DB::table('suratmasuk')->count();
            $datane = suratmasuk::select('id','suratmasuk_id','lampiran')->whereNotNull('lampiran')->get();
        }

        return view('suratmasuk.lampiran',['datane' => $datane, 'count' => $count]);
    }

    public function lampiranDownload($id){
      $datane = suratmasuk::find($id);

      $lokasi = storage_path('app/suratmasuk/').$datane->lampiran;

      /*$header = ['Content-Type' => 'application/pdf',
                 'Content-Disposition' => 'attachment; filename="Pengumuman.pdf"',];*/
      $headers = array(
            'Content-Type: application/pdf',
            'Content-Transfer-Encoding:binary',
        );

      return response()->download($lokasi, $datane->lampiran_dir, $headers);
    }

    public function disp($id){
        $datane = disposisi::select('disposisi.*','pegawai.sebagai')->where('suratmasuk_id', $id)->join('pegawai','disposisi.id_tujuan','=','pegawai.pegawai_id')->get();
        $dataSuratMasuk = suratmasuk::where('id', $id)->first();

        return view('disposisi.disposisi', ['datane' => $datane, 'dataSuratMasuk' => $dataSuratMasuk]);
    }

    public function dispBuat($id){
        $dataSuratMasuk = suratmasuk::where('id', $id)->first();
        $dataSeksi = pegawai::where('kd_role', 'SEKSI')->get();

        return view('disposisi.tambah', ['dataSuratMasuk' => $dataSuratMasuk, 'dataSeksi' => $dataSeksi]);  
    }

    public function dispBuatGo(Request $req){
        $tabel = new \App\disposisi;

        $tabel->suratmasuk_id = $req->suratmasuk_id;
        $tabel->id_tujuan = $req->id_tujuan;
        //$tabel->tujuan = $req->tujuan;
        $tabel->isi_disposisi = $req->isi_disposisi;
        $tabel->user = Session::get('username');

        if($tabel->save()){
            return back()->with('success-msg', 'Data berhasil disimpan.');
        }else{
            return back()->with('error-msg', 'Data gagal disimpan.');
        }
    }

    public function dispHapus($id){
        $tabel = disposisi::find($id);

        if($tabel->delete($id)){
            return back()->with('success-msg', 'Data berhasil dihapus.');
        }else{
            return back()->with('error-msg', 'Data gagal dihapus.');
        }
    }

    public function dispUbah($id){
        $datane = disposisi::find($id);
        $dataSeksi = pegawai::where('kd_role', 'SEKSI')->get();

        return view('disposisi.ubah')->with(['datane' => $datane, 'dataSeksi' => $dataSeksi]);
    }

    public function dispUbahGo(Request $req, $id){
        $cek = disposisi::where('id', $id)->update([
             "id_tujuan" => $req->id_tujuan,
             "isi_disposisi" => $req->isi_disposisi
         ]);

        if($cek == TRUE){
            return back()->with('success-msg', 'Data berhasil diubah.');
        }else{
            return back()->with('error-msg', 'Data gagal diubah.');
        }
    }

    public function dispCetak($id){
        $dataSuratMasuk = suratmasuk::where('id', $id)->first();
        $dataDisp = disposisi::where('suratmasuk_id', $id)->get();
        $dataKantor = kantor::where('id', 1)->first();
 
        $pdf = PDF::loadview('disposisi.cetak', ['dataSuratMasuk' => $dataSuratMasuk, 'dataDisp' => $dataDisp, 'dataKantor' => $dataKantor]);
        return $pdf->download('Lembar Disposisi.pdf');
        //return view('disposisi.cetak', ['dataSuratMasuk' => $dataSuratMasuk, 'dataDisp' => $dataDisp, 'dataKantor' => $dataKantor]);
    }
}
