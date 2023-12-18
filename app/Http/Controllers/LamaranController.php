<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lamaran;
use App\Models\Lowongan;
use DB;

class LamaranController extends Controller
{
    //
    function show(){
        $data['lamaran'] = DB::table('lamaran')
        ->leftJoin('alumni', 'lamaran.nis', '=', 'alumni.nis')
        ->get();
        $data['lamaran'] = DB::table('lamaran')
        ->leftJoin('lowongan', 'lamaran.id_loker', '=', 'lowongan.id_loker')
        ->get();
        return view('admin.lamaran',$data);
    }

    function add(){
        $alumni = DB::table('alumni')->get();
        $lowongan = DB::table('lowongan')->get();
        $data = [
            'action'=>url('lamaran/create'),
            'tombol'=>'simpan',
            'lamaran'=>(object)[
            'nis'=>'',
            'id_loker'=>'',
            'surat_lamaran'=>'',
            'cv'=>''         
            ]
        ];
        
        return view('admin.form_lamaran',['alumni'=>$alumni, 'lowongan'=>$lowongan],$data);
    }

    function create(Request $request){
        Lamaran::create([
        'nis'=> Auth::guard('alumni')->user()->nis,
        'id_loker'=>$request->id_loker,
        'surat_lamaran'=>$request->file('surat_lamaran')->store('surat_lamaran'),
        'cv'=>$request->file('cv')->store('cv')
        ]);
        return redirect('blog');
    }
    function delete($id){
        Lamaran::where('id_lamaran',$id)->delete();
        return redirect('lamaran');
    }
    function edit($id){
        $data['lowongan'] = DB::table('lowongan')->get();
        $data['lamaran'] = Lamaran::where('id',$id)->first();
        $data['action'] = url('lamaran/update').'/'.$data['lamaran']->id;
        $data['tombol'] = "Update";

        return view("admin.form_lamaran", $data);
    }
    function update(Request $request){
        $data = Lamaran::where('id_lamaran',$request->id_lamaran)->first();
        if($request->surat_lamaran ==''){
            $surat_lamaran = $data->surat_lamaran;
        }else{
            $surat_lamaran = $request->file('surat_lamaran')->store('surat_lamaran');
        }
        $data = Lamaran::where('id_lamaran',$request->id_lamaran)->first();
        if($request->cv ==''){
            $cv = $data->cv;
        }else{
            $cv = $request->file('cv')->store('cv');
        }
        Lamaran::where('id',$request->id)->update([
        'nis'=>$request->nis,
        'id_loker'=>$request->id_loker,
        'surat_lamaran'=>$surat_lamaran,
        'cv'=>$cv
        ]);
        return redirect('lamaran');
    }
}
