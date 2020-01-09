<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Hashing\BcryptHasher;
use App\Mahasiswa;
use App\Surat;
use Carbon\Carbon;

class MahasiswaController extends Controller{
    public function __construct()
    {
        //
    }

    public function get_user(Request $request, $nim)
    {
        $user = Mahasiswa::where('nim', $nim)->first();

        return response()->json([
            'nim'           => $user->nim,
            'nama'          => $user->nama,
            'tempat_lahir'  => $user->tempat_lahir,
            'tanggal_lahir' => $user->tanggal_lahir,
            'email'         => $user->email,
            'jurusan'       => $user->jurusan,
            'fakultas'      => $user->fakultas
        ]);
    }

    public function get_semester(Request $request, $nim)
    {
        $user = Mahasiswa::where('nim', $nim)->first();
        $angkatan = $user->angkatan;

        $now_y = Carbon::now()->format('Y');
        $now_m = Carbon::now()->format('m');


        if($now_m > 6){
            $semester = (($now_y - $angkatan) * 2) + 1;
            if($semester==0){
                $semester=1;
            }
        }else {
            $semester = ($now_y - $angkatan) * 2;
        }

        if($semester==1){
            $semester = 'I (Satu)'
        }else if($semester==2){
            $semester = 'II (Dua)'
        }else if($semester==2){
            $semester = 'III (Tiga)'
        }else if($semester==2){
            $semester = 'IV (Empat)'
        }else if($semester==2){
            $semester = 'V (Lima)'
        }else if($semester==2){
            $semester = 'VI (Enam)'
        }else if($semester==2){
            $semester = 'VII (Tujuh)'
        }else if($semester==2){
            $semester = 'VIII (Delapan)'
        }else if($semester==2){
            $semester = 'IX (Sembilan)'
        }else if($semester==2){
            $semester = 'X (Sepuluh)'
        }else if($semester==2){
            $semester = 'XI (Sebelas)'
        }else if($semester==2){
            $semester = 'XII (Dua Belas)'
        }else if($semester==2){
            $semester = 'XIII (Tiga Belas)'
        }else if($semester==2){
            $semester = 'XIV (Empat Belas)'
        }

        return response()->json([
            'smst_jln'    => $semester;
        ]);
    }

    public function get_history(Request $request, $nim)
    {
        $surat = Surat::where('nim1', $nim)->limit(10)->get();

        return response()->json([
            'surat'          => $surat
        ]);
    }

    public function login(Request $request)
    {
        $hasher = app()->make('hash');
        $nim = $request->input('nim');
        $password = $request->input('password');
        $login = Mahasiswa::where('nim', $nim)->first();
        if (!$login) {
            $res['success'] = false;
            $res['message'] = 'Your nim incorrect!';
            return response($res);
        }else{
            if (password_verify($password, $login->password)) {
                $api_token = sha1(time());
                $res['success'] = true;
                $res['api_token'] = $api_token;
                $res['message'] = $login;
                return response($res);
            }else{
                $res['success'] = false;
                $res['message'] = 'You email or password incorrect!';
                return response($res);
            }
        }
    }

    public function logout(){
        $res['success'] = false;
        $res['message'] = 'Logout!';
        return response($res);
    }

}
