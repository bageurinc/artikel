<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Bageur\PaketUmrah\model\jadwal;

class umrohController extends Controller
{
    public function index(Request $request)
    {
        $umroh  = jadwal::with(['paket'])->WhereHas('paket', function($q){
            $q->where('tipe_paket', 'like', '%umroh%');
        })->limit(7)->orderBy('created_at','desc')->get();
        return view('umroh', compact('umroh'));
    }
    public function detailumroh($id,$any)
    {
        $find    = jadwal::with(['paket'])->findOrfail($id);
        return view('detail-umroh',compact('find'));
    }
}
