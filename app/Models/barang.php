<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;
    protected $table = 'barangs';
    protected $primarykey = 'id';
    protected $fillable = ['nama_barang','foto','deskripsi','harga','created_at','updated_at'];
}
