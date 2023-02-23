<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{
   public function getmember(){

       $member = Member::get();
        return response()->json($member);
   }

   public function pilihmember($id){

        $member = Member::where('id', '=' , $id)->get();
            return response()->json($member);
   }

   public function createmember(Request $request){
        $member = Member::create([
            'nama_member' => $request->input('nama_member'),
            'no_tlp' => $request->input('no_tlp'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'gender' => $request->input('gender'),
            'alamat' => $request->input('alamat'),
        ]);

        return response()->json(['message' => 'Berhasil tambah member']);
   }

   public function updatemember(Request $request, $id){
        $member = Member::where('id' , '=' , $id)->update([
            'nama_member' => $request->input('nama_member'),
            'no_tlp' => $request->input('no_tlp'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'gender' => $request->input('gender'),
            'alamat' => $request->input('alamat'),
        ]);

        return response()->json(['message' => 'Berhasil update member']);
   }

   public function deletemember($id){
        $member = Member::where('id' , '=' ,$id)->delete();
        return response()->json(['message' => 'Berhasil delete member']);
   }


}
