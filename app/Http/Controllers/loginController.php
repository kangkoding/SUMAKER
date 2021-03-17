<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\pegawai;
use Illuminate\Http\Request;

class loginController extends Controller
{
	public function index()
	{
		return view('login');
	}

   function mlebu(Request $kiriman){
   	$datane = pegawai::where('username',$kiriman->username)->where('password',md5($kiriman->password))->get();

   	if(count($datane) > 0){
         if($datane[0]['kd_role'] == 'ADMIN'){
            Auth::guard('admin')->LoginUsingId($datane[0]['id']);
            $sessionUsername = $datane[0]['username'];
            $sessionRole = $datane[0]['kd_role'];
            $sessionEmail = $datane[0]['email'];
            $sessionHp = $datane[0]['hp'];
            $sessionAlamat = $datane[0]['alamat'];
            $sessionDpn = $datane[0]['gelar_dpn'];
            $sessionNama = $datane[0]['nama'];
            $sessionId = $datane[0]['id'];
            $sessionBlkng = $datane[0]['gelar_blkng'];   
            $sessionFoto = $datane[0]['foto_dir'];
            $sessionIdPegawai = $datane[0]['pegawai_id'];
            $sessionSebagai = $datane[0]['sebagai'];
            Session::put('pegawai_id',$sessionIdPegawai);
            Session::put('username',$sessionUsername);
            Session::put('role',$sessionRole);
            Session::put('email',$sessionEmail);
            Session::put('hp',$sessionHp);
            Session::put('alamat',$sessionAlamat);
            Session::put('dpn',$sessionDpn);
            Session::put('nama',$sessionNama);
            Session::put('blkng',$sessionBlkng);
            Session::put('idne',$sessionId);
            Session::put('foto_dir',$sessionFoto);
            Session::put('sebagai',$sessionSebagai);

            return redirect('/admin');
         }elseif($datane[0]['kd_role'] == 'LOKET'){
            Auth::guard('loket')->LoginUsingId($datane[0]['id']);
            $sessionUsername = $datane[0]['username'];
            $sessionRole = $datane[0]['kd_role'];
            $sessionEmail = $datane[0]['email'];
            $sessionHp = $datane[0]['hp'];
            $sessionAlamat = $datane[0]['alamat'];
            $sessionDpn = $datane[0]['gelar_dpn'];
            $sessionNama = $datane[0]['nama'];
            $sessionBlkng = $datane[0]['gelar_blkng'];   
            $sessionId = $datane[0]['id'];
            $sessionFoto = $datane[0]['foto_dir'];
            $sessionIdPegawai = $datane[0]['pegawai_id'];
            $sessionSebagai = $datane[0]['sebagai'];
            Session::put('pegawai_id',$sessionIdPegawai);
            Session::put('username',$sessionUsername);
            Session::put('role',$sessionRole);
            Session::put('email',$sessionEmail);
            Session::put('hp',$sessionHp);
            Session::put('alamat',$sessionAlamat);
            Session::put('dpn',$sessionDpn);
            Session::put('nama',$sessionNama);
            Session::put('blkng',$sessionBlkng);
            Session::put('idne',$sessionId);
            Session::put('foto_dir',$sessionFoto);
            Session::put('sebagai',$sessionSebagai);

            return redirect('/loket');
         }else{
            Auth::guard('seksi')->LoginUsingId($datane[0]['id']);
            $sessionUsername = $datane[0]['username'];
            $sessionRole = $datane[0]['kd_role'];
            $sessionEmail = $datane[0]['email'];
            $sessionHp = $datane[0]['hp'];
            $sessionAlamat = $datane[0]['alamat'];
            $sessionDpn = $datane[0]['gelar_dpn'];
            $sessionNama = $datane[0]['nama'];
            $sessionBlkng = $datane[0]['gelar_blkng'];
            $sessionId = $datane[0]['id'];   
            $sessionFoto = $datane[0]['foto_dir'];
            $sessionIdPegawai = $datane[0]['pegawai_id'];
            $sessionSebagai = $datane[0]['sebagai'];
            Session::put('pegawai_id',$sessionIdPegawai);
            Session::put('username',$sessionUsername);
            Session::put('role',$sessionRole);
            Session::put('email',$sessionEmail);
            Session::put('hp',$sessionHp);
            Session::put('alamat',$sessionAlamat);
            Session::put('dpn',$sessionDpn);
            Session::put('nama',$sessionNama);
            Session::put('blkng',$sessionBlkng);
            Session::put('idne',$sessionId);
            Session::put('foto_dir',$sessionFoto);
            Session::put('sebagai',$sessionSebagai);

            return redirect('/seksi');
         }
   	}else{
   		return redirect('/')->with('error-msg', 'Username & Password salah.');
   	}
   }

   function metu(){
   	if(Auth::guard('admin')->check()) {
   		Auth::guard('admin')->logout();
         Session::forget('username');
         Session::forget('role');
         Session::forget('email');
         Session::forget('hp');
         Session::forget('alamat');
         Session::forget('dpn');
         Session::forget('nama');
         Session::forget('blkng');
         Session::forget('idne');
         Session::forget('pegawai_id');
         Session::forget('foto_dir');
         Session::forget('sebagai');
   	}else if(Auth::guard('loket')->check()){
   		Auth::guard('loket')->logout();
         Session::forget('username');
         Session::forget('role');
         Session::forget('email');
         Session::forget('hp');
         Session::forget('alamat');
         Session::forget('dpn');
         Session::forget('nama');
         Session::forget('blkng');
         Session::forget('idne');
         Session::forget('pegawai_id');
         Session::forget('foto_dir');
         Session::forget('sebagai');
   	}else if(Auth::guard('seksi')->check()){
         Auth::guard('seksi')->logout();
         Session::forget('username');
         Session::forget('role');
         Session::forget('email');
         Session::forget('hp');
         Session::forget('alamat');
         Session::forget('dpn');
         Session::forget('nama');
         Session::forget('blkng');
         Session::forget('idne');
         Session::forget('pegawai_id');
         Session::forget('foto_dir');
         Session::forget('sebagai');
   	}
   	return redirect('/');
   }
}
