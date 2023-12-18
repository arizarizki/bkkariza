<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use DB;

class PageController extends Controller
{
    //
    function show(){
        $data['lowongan'] = Lowongan::where('status','active')->get();
        return view('lowongan.loker',$data);
    }

    function add(){
        $perusahaan = DB::table('perusahaan')->get();
        $data = [
            'action'=>url('loker/create'),
            'tombol'=>'simpan',
            'lowongan'=>(object)[
                'nis'=>'',
                'id_perusahaan'=>'',
                'tanggal'=>'',
                'judul'=>'',
                'deskripsi'=>'',
            ]
            ];
            $data['perusahaan']=Perusahaan::all();
            return view('lowongan.form_loker',['perusahaan'=>$perusahaan],$data);
    }
    function create(Request $request){
        Lowongan::create([
        'nis'=>$request->nis,
        'id_perusahaan'=>$request->id_perusahaan,
        'tanggal'=>$request->tanggal,
        'judul'=>$request->judul,
        'deskripsi'=>$request->deskripsi,
        'status'=>'inactive',
        ]);

        return view('loker');
    }
}
