<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\barang;

class BarangController extends Controller
{
    public function getbarang(){
        $barang = barang::get();
            return response()->json($barang);
    }

    public function pilihbarang($id){
        $barang = barang::where('id_barang','=',$id)->get();
            return response()->json($barang);
    }

    public function createbarang(Request $request ){
        $barang = barang::create([
            'nama_barang' => $request->input('nama_barang'),
            'foto' => $request->input('foto'),
            'deskripsi' => $request->input('deskripsi'),
            'harga' => $request->input('harga'),
        ]);
            return response()->json(['Pesan' => 'Sukses menambah barang']);
    }

    public function updatebarang(Request $request, $id){
        $barang = barang::where('id','=',$id)->update([
            'nama_barang' => $request->input('nama_barang'),
            'foto' => $request->input('foto'),
            'deskripsi' => $request->input('deskripsi'),
            'harga' => $request->input('harga'),
        ]);
            return response()->json(['pesan' => 'Sukses update barang']);
    }

    public function deletebarang($id){
        $barang = barang::where('id','=',$id)->delete();
            return response()->json(['pesan' => 'Sukses hapus barang']);
    }
}
