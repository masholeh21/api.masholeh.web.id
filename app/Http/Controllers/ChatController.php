<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use App\Surat;
use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ChatController extends Controller
{
    private
        $response,
        $status = 200,
        $client,
        $rasa_url,
        $rasa_ip;

    public function __construct()
    {
        session_start();
        $this->client = new \GuzzleHttp\Client();
        $this->rasa_url = 'http://52.148.88.134:5005/webhooks/rest/webhook';
        $this->rasa_ip = '52.148.88.134';
    }

    public function index()
    {
        echo 'It\'s Work!';
    }

    public function nowTime(Request $request) {
        date_default_timezone_set('Asia/Jakarta');

        $time = date("H");
        $timezone = date("e");
        if ($time < "12") {
           $nowTime = "pagi";
        } else
        if ($time >= "12" && $time < "15") {
            $nowTime = "siang";
        } else
        if ($time >= "15" && $time < "18") {
            $nowTime = "sore";
        } else
        if ($time >= "18") {
            $nowTime = "malam";
        }

        return response()->json(['time' => $nowTime]);
    }


    public function apply(Request $request) {

        $now = Carbon::now()->format('Y-m-d');

        $surat = Surat::create([
            'id_jenis_surat' => $request->input('id_jenis_surat'),
            'nim1' => $request->input('nim'),
            'email' => $request->input('nim').'@students.uii.ac.id',
            'status' => 0,
            'maksud' => $request->input('maksud'),
            'alamat' => $request->input('alamat'),
            'smst_jln' => $request->input('smst_jln'),
            'nama_ortu' => $request->input('nama_ortu'),
            'nip' => $request->input('nip'),
            'pangkat' => $request->input('pangkat'),
            'pekerjaan' => $request->input('pekerjaan'),
            'instansi' => $request->input('instansi'),
            'tgl_pesan' => $now
        ]);

        if (!$surat) {
            $res['surat'] = false;
            return response($res);
        }else{
            $res['surat'] = true;
            return response($res);
        }
    }

}
