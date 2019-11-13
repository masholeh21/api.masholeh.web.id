<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Surat extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "surat";

    protected $fillable = [
                'id_surat', 'id_jenis_surat', 'nim1', 'email', 'status', 'tgl_pesan', 'tgl_setujui', 'tgl_jadi', 'tgl_ambil', 'persetujuan', 'penolakan', 'nosurat', 'nomersurat', 'smst_jln', 'kedubes', 'no_paspor', 'scan', 'no_ijazah', 'tahun_lulus', 'tgl_ijazah', 'alamat', 'judul', 'subyek', 'maksud', 'lokasi', 'nama_pimpinan', 'kota', 'pembimbing1', 'pembimbing2', 'nama_ortu', 'pekerjaan', 'nip', 'instansi', 'pangkat', 'dikirim', 'kirim_alamat', 'kirim_kabupaten', 'kirim_provinsi', 'tarif', 'scan_bayar'
    ];

}
