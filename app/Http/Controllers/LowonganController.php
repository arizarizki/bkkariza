<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lowongan;
use App\Models\Alumni;
use App\Models\Perusahaan;
use DB;

class LowonganController extends Controller
{
    //
    function show(){
        $data['lowongan'] = DB::table('lowongan')
        ->leftJoin('perusahaan', 'lowongan.id_perusahaan', '=', 'perusahaan.id_perusahaan')
        ->get();
        $data['lowongan'] = DB::table('lowongan')
        ->leftJoin('alumni', 'lowongan.nis', '=', 'alumni.nis')
        ->get();
        return view('admin.lowongan',$data);
    }

    function add(){
        $data = [
            'action'=>url('lowongan/create'),
            'tombol'=>'simpan',
            'lowongan'=>(object)[
            'nis'=>'',
            'id_perusahaan'=>'',
            'judul'=>'',
            'deskripsi'=>'',
            'tanggal'=>'',
            'status'=>'',
            ]
        ];
        $data ['alumni']=Alumni::all();
        $data ['perusahaan'] = Perusahaan::all();
        return view('admin.form_lowongan',$data);
    }

    function create(Request $request){
        Lowongan::create([
        'nis'=>$request->nis,
        'id_perusahaan'=>$request->id_perusahaan,
        'judul'=>$request->judul,
        'deskripsi'=>$request->deskripsi,
        'tanggal'=>$request->tanggal,
        'status'=>$request->status
        ]);
        return redirect('lowongan');
    }
    function delete($id){
        Lowongan::where('id_loker',$id)->delete();
        return redirect('lowongan');
    }
    function edit($id){
        $data['lowongan'] = Lowongan::where('id_loker',$id)->first();
        $data['action'] = url('lowongan/update').'/'.$data['lowongan']->id_loker;
        $data['tombol'] = "Update";

        return view("admin.form_lowongan", $data);
    }
    function update(Request $request){
        $data = Lowongan::where('id_loker',$request->id_loker)->first();
        Lowongan::where('id_loker',$request->id_loker)->update([
            'nis'=>$request->nis,
            'id_perusahaan'=>$request->id_perusahaan,
            'judul'=>$request->judul,
            'deskripsi'=>$request->deskripsi,
            'tanggal'=>$request->tanggal,
            'status'=>$request->status,
        ]);
        return redirect('lowongan');
    }
}
