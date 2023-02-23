<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksis';
    protected $primarykey = 'id';
    protected $fillable = ['id_siswa','id_barang','tanggal_beli','status','tanggal_dikirim','tanggal_sampai','created_at','updated_at'];
}
