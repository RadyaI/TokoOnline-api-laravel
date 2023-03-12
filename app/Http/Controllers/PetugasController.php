<?php

namespace App\Http\Controllers;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    //

    public function getpetugas(){
        $petugas = Petugas::get();
            return response()->json($petugas);
    }

    public function getsatupetugas($id){
        $petugas = petugas::where('id_petugas','=',$id)->first();
            if(!$petugas || !$petugas->exists()){
                return response()->json(['Message' => 'Data tidak ada / sudah di hapus'], 404);
            }
            // if(!$petugas){
            //     return response()->json(['Message' => 'Data tidak ada / sudah di hapus'], 404);
            // }

            return response()->json($petugas);
    }

    public function createpetugas(Request $req){
        $validator = Validator::make($req->all(),[
            'nama_petugas' => 'required',
            'umur' => 'required',
            'alamat' => 'required',
            'gender' => 'required',
            'level' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->tojson());
        }

        $create = Petugas::create([
            'nama_petugas' => $req->get('nama_petugas'),
            'umur' => $req->input('umur'),
            'alamat' => $req->input('alamat'),
            'gender' => $req->input('gender'),
            'level' => $req->input('level'),
        ]);
            return response()->json(['Message' => 'Sukses tambah siswa']);

    }

    public function editpetugas(Request $req, $id){

        $validator = Validator::make($req -> all(),[
            'nama_petugas' => 'required',
            'umur' => 'required',
            'alamat' =>'required',
            'gender' =>'required',
            'level' => 'required',
        ]);

            if($validator -> fails()){
                return response()->json($validator -> errors() ->tojson());
            }

        $petugas = Petugas::where('id_petugas','=',$id)->update([
            'nama_petugas' => $req->input('nama_petugas'),
            'umur' => $req->input('umur'),
            'alamat' => $req->input('alamat'),
            'gender' => $req->input('gender'),
            'level' => $req->input('level'),
        ]);

        if($petugas){
            return response()->json([
                'Message' => 'Berhasil update petugas',
                'Status' => true
            ]);
        }else{
            return response()->json([
                'Message' => 'Gagal update petugas',
                'Status' => false
            ]);
        }
    }

    public function deletepetugas($id){
        $petugas = Petugas::where('id_petugas','=',$id)->delete();

            if($petugas){
                return response()->json([
                    'Message' => 'Sukses delete petugas'
                ]);
            } else {
                return response()->json([
                    'Message' => 'Gagal delete petugas'
                ]);
            }
    }
}
