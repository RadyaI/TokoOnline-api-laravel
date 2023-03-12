<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    use HasFactory;
    protected $table = 'petugas';
    protected $primarykey = 'id_petugas';
    protected $fillable = ['nama_petugas','umur','alamat','gender','level','created_at','updated_at'];
}
