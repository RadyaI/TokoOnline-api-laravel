<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;

class TransaksiController extends Controller
{
    public function gettransaksi(){
        $data = Transaksi::select()
            ->join('members','transaksis.id','=','members.id_member')
            ->join('barangs','transaksis.id','=','barangs.id_barang')
            ->select('id','nama_member','nama_barang','tanggal_beli','status','tanggal_dikirim','tanggal_sampai')
            ->get();
            return response()->json($data);
    }

    public function pilihtransaksi($id){
        $data = Transaksi::where('id','=', $id)
        ->join('members','transaksis.id','=','members.id_member')
        ->join('barangs','transaksis.id','=','barangs.id_barang')
        ->select('id','nama_member','nama_barang','tanggal_beli','status','tanggal_dikirim','tanggal_sampai')
        ->get();;
            return response()->json($data);
    }

    public function createtransaksi(Request $request){

        $tgl_beli = now();

        $data = Transaksi::create([
            'id_siswa' => $request->input('id_siswa'),
            'id_barang' => $request->input('id_barang'),
            'tanggal_beli' => $tgl_beli,
            'status' => 'proses',
        ]);
            return response()->json(['pesan' => 'Berhasil menambah transaksi']);
    }

    public function updatekirim($id){

        $tgl_kirim = now();

        $data = Transaksi::where('id','=',$id)->update([
            'status' => 'dikirim',
            'tanggal_dikirim' => $tgl_kirim
        ]);
            return response()->json(['pesan' => 'berhasil update status' , 'status' => 'dikirim']);
    }

    public function updatesampai($id){

        $tgl_sampai = now();

        $data = Transaksi::where('id','=',$id)->update([
            'status' => 'sampai',
            'tanggal_sampai' => $tgl_sampai,
        ]);
            return response()->json(['pesan' => 'Berhasil update status' , 'status' => 'sampai']);
    }

    public function deletetransaksi($id){
        $data = Transaksi::where('id','=',$id)->delete();
            return response()->json(['Message' => 'Sukses hapus siswa']);
    }
}
