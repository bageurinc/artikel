<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Bageur\PaketUmrah\model\jadwal;

class hajiController extends Controller
{
    public function index(Request $request)
    {
        $haji  = jadwal::with(['paket'])->WhereHas('paket', function($q){
            $q->where('tipe_paket', 'like', '%haji%');
        })->limit(7)->orderBy('created_at','desc')->get();
        return view('haji', compact('haji'));
    }
    public function detailhaji($id,$any)
    {
        $find    = jadwal::with(['paket'])->findOrfail($id);
        return view('detail-haji',compact('find'));
    }
}
