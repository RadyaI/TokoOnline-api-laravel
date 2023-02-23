<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $table = 'members';
    protected $primarykey = 'id';
    protected $fillable = ['nama_member','no_tlp','tanggal_lahir','gender','alamat','created_at','updated_at'];
}
