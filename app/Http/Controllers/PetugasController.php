<?php

namespace App\Http\Controllers;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PetugasController extends Controller
{
    //

    public function getpetugas(){
        $petugas = Petugas::get();
            return response()->json($petugas);
    }

    public function getsatupetugas($id){
        $petugas = petugas::where('id_petugas','=',$id)->get();
            return response()->json($petugas);
    }

    public function createpetugas(Request $req){
        $validator = Validator::make($req->all(),[
            'nama_petugas' => 'require',
            'umur' => 'require',
            'alamat' => 'require',
            'gender' => 'require',
            'level' => 'require',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->tojson());
        }

        $create = Petugas::create([
            'nama_petugas' => $req->input('nama_petugas'),
            'umur' => $req->input('nama_petugas'),
            'alamat' => $req->input('nama_petugas'),
            'gender' => $req->input('nama_petugas'),
            'level' => $req->input('nama_petugas'),
        ]);
            return response()->json(['Message' => 'Sukses tambah siswa']);

    }
}
