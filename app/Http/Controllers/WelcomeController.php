<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Kepel;
use App\Models\Ibip;
use App\Models\Perizinan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WelcomeController extends Controller
{
    public function registrasi()
    {
    	$kepel = Kepel::all();
    	return view('registrasi', compact('kepel'));
    }

    public function pregistrasi(Request $request)
    {
    	if($request->stayon == "gedung"){
    		User::create([
    			'kepel_id' => $request->kepel_id,
    			'nip' => $request->nip,
    			'name' => $request->name,
    			'no_siswa' => $request->no_siswa,
    			'email' => $request->email,
                'no_telp' => $request->no_telp,
    			'password' => bcrypt($request->password),
    			'kelas' => $request->kelas,
    			'kegiatan' => $request->kegiatan,
    			'gedung' => 1,
    			'kamar_gedung' => $request->kamar_gedung,
                'mess' => 0,
    			'kamar_mess' => "-",
                'gedung_flat' => 0,
    			'gedung_flat_in' => "-",
    			'group' => 2,
    		]);
    	}elseif($request->stayon == "mess"){
    		User::create([
    			'kepel_id' => $request->kepel_id,
    			'nip' => $request->nip,
    			'name' => $request->name,
    			'no_siswa' => $request->no_siswa,
                'email' => $request->email,
    			'no_telp' => $request->no_telp,
    			'password' => bcrypt($request->password),
    			'kelas' => $request->kelas,
    			'kegiatan' => $request->kegiatan,
    			'mess' => 1,
    			'kamar_mess' => $request->kamar_mess,
                'gedung' => 0,
    			'kamar_gedung' => "-",
                'gedung_flat' => 0,
    			'gedung_flat_in' => "-",
    			'group' => 2,
    		]);
    	}else{
    		User::create([
    			'kepel_id' => $request->kepel_id,
    			'nip' => $request->nip,
    			'name' => $request->name,
    			'no_siswa' => $request->no_siswa,
    			'email' => $request->email,
                'no_telp' => $request->no_telp,
    			'password' => bcrypt($request->password),
    			'kelas' => $request->kelas,
    			'kegiatan' => $request->kegiatan,
    			'gedung_flat' => 1,
    			'gedung_flat_in' => $request->gedung_flat_in,
                'mess' => 0,
    			'kamar_mess' => "-",
    			'gedung' => 0,
                'kamar_gedung' => "-",
    			'group' => 2,
    		]);
    	}

    	return redirect()->route('ulogin')->with('success', 'your message,here');
    }

    public function login()
    {
    	return view('login');
    }

    public function pulogin(Request $request)
    {
        if(Auth::attempt($request->only('nip', 'password'))){
            return redirect()->route('welcome');
        }

        // Alert::error("Perhatian","Email atau password SALAH!");
        return redirect()->route('ulogin');
    }

    public function profil()
    {
        $kepel = Kepel::all();
        $user = User::find(Auth::user()->id);
        return view('profil', compact('user','kepel'));
    }

    public function pprofil(Request $request)
    {
        if(empty($request->password)){
            if($request->stayon == "gedung"){
                User::where('id', Auth::user()->id)
                ->update([
                    'kepel_id' => $request->kepel_id,
                    'nip' => $request->nip,
                    'name' => $request->name,
                    'no_siswa' => $request->no_siswa,
                    'email' => $request->email,
                    'no_telp' => $request->no_telp,
                    'kelas' => $request->kelas,
                    'kegiatan' => $request->kegiatan,
                    'gedung' => 1,
                    'kamar_gedung' => $request->kamar_gedung,
                    'mess' => 0,
                    'kamar_mess' => "-",
                    'gedung_flat' => 0,
                    'gedung_flat_in' => "-",
                    'group' => 2,
                ]);
            }elseif($request->stayon == "mess"){
                User::where('id', Auth::user()->id)
                ->update([
                    'kepel_id' => $request->kepel_id,
                    'nip' => $request->nip,
                    'name' => $request->name,
                    'no_siswa' => $request->no_siswa,
                    'email' => $request->email,
                    'no_telp' => $request->no_telp,
                    'kelas' => $request->kelas,
                    'kegiatan' => $request->kegiatan,
                    'mess' => 1,
                    'kamar_mess' => $request->kamar_mess,
                    'gedung' => 0,
                    'kamar_gedung' => "-",
                    'gedung_flat' => 0,
                    'gedung_flat_in' => "-",
                    'group' => 2,
                ]);
            }else{
                User::where('id', Auth::user()->id)
                ->update([
                    'kepel_id' => $request->kepel_id,
                    'nip' => $request->nip,
                    'name' => $request->name,
                    'no_siswa' => $request->no_siswa,
                    'email' => $request->email,
                    'no_telp' => $request->no_telp,
                    'kelas' => $request->kelas,
                    'kegiatan' => $request->kegiatan,
                    'gedung_flat' => 1,
                    'gedung_flat_in' => $request->gedung_flat_in,
                    'mess' => 0,
                    'kamar_mess' => "-",
                    'gedung' => 0,
                    'kamar_gedung' => "-",
                    'group' => 2,
                ]);
            }
        }else{
            if($request->stayon == "gedung"){
                User::where('id', Auth::user()->id)
                ->update([
                    'kepel_id' => $request->kepel_id,
                    'nip' => $request->nip,
                    'password' => bcrypt($request->password),
                    'name' => $request->name,
                    'no_siswa' => $request->no_siswa,
                    'email' => $request->email,
                    'no_telp' => $request->no_telp,
                    'kelas' => $request->kelas,
                    'kegiatan' => $request->kegiatan,
                    'gedung' => 1,
                    'kamar_gedung' => $request->kamar_gedung,
                    'mess' => 0,
                    'kamar_mess' => "-",
                    'gedung_flat' => 0,
                    'gedung_flat_in' => "-",
                    'group' => 2,
                ]);
            }elseif($request->stayon == "mess"){
                User::where('id', Auth::user()->id)
                ->update([
                    'kepel_id' => $request->kepel_id,
                    'nip' => $request->nip,
                    'password' => bcrypt($request->password),
                    'name' => $request->name,
                    'no_siswa' => $request->no_siswa,
                    'email' => $request->email,
                    'no_telp' => $request->no_telp,
                    'kelas' => $request->kelas,
                    'kegiatan' => $request->kegiatan,
                    'mess' => 1,
                    'kamar_mess' => $request->kamar_mess,
                    'gedung' => 0,
                    'kamar_gedung' => "-",
                    'gedung_flat' => 0,
                    'gedung_flat_in' => "-",
                    'group' => 2,
                ]);
            }else{
                User::where('id', Auth::user()->id)
                ->update([
                    'kepel_id' => $request->kepel_id,
                    'nip' => $request->nip,
                    'password' => bcrypt($request->password),
                    'name' => $request->name,
                    'no_siswa' => $request->no_siswa,
                    'email' => $request->email,
                    'no_telp' => $request->no_telp,
                    'kelas' => $request->kelas,
                    'kegiatan' => $request->kegiatan,
                    'gedung_flat' => 1,
                    'gedung_flat_in' => $request->gedung_flat_in,
                    'mess' => 0,
                    'kamar_mess' => "-",
                    'gedung' => 0,
                    'kamar_gedung' => "-",
                    'group' => 2,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Data berhasil diubah');
    }

    public function perizinan()
    {
        $perizinan = Perizinan::where('status', 0)->where('kepel_id', Auth::user()->kepel_id)->get();
        return view('perizinan', compact('perizinan'));
    }

    public function pengajuan(Request $request)
    {
        $perizinan = Perizinan::find($request->id);
        return view('pengajuan', compact('perizinan'));
    }

    public function ppengajuan(Request $request)
    {
        Ibip::create([
            'perizinan_id' => $request->id,
            'user_id' => Auth::user()->id,
            'hari_tanggal_berangkat' => date("l").', '.date('d F Y'),
            'jam_berangkat' => date("h:i:s")." WIB",
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('riwayat');
    }

    public function riwayat()
    {
        $ibip = Ibip::where('user_id', Auth::user()->id)->get();
        return view('riwayat', compact('ibip'));
    }

    public function driwayat(Request $request)
    {
        Ibip::destroy($request->id);
        return redirect()->back();
    }

    public function comeback(Request $request)
    {
        Ibip::where('id', $request->id)
        ->update([
            'hari_tanggal_kembali' => date("l").', '.date('d F Y'),
            'jam_kembali' => date("h:i:s")." WIB",
            'status' => 1,
        ]);
        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('ulogin');
    }
}
