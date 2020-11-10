<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Bageur\Artikel\model\artikel;
use Bageur\Slider\model\slider;
use Bageur\Album\model\album;
use Bageur\PaketUmrah\model\jadwal;
use Bageur\PaketUmrah\model\paket;
use App\video;

class homeController extends Controller
{
    public function index()
    {
        $slider  = slider::limit(4)->orderBy('created_at','desc')->get();
        $paket   = paket::get();
        $haji  = jadwal::with(['paket'])->WhereHas('paket', function($q){
            $q->where('tipe_paket', 'like', '%haji%');
        })->limit(7)->orderBy('created_at','desc')->get();
        $umroh  = jadwal::with(['paket'])->WhereHas('paket', function($q){
            $q->where('tipe_paket', 'like', '%umroh%');
        })->limit(7)->orderBy('created_at','desc')->get();
        $artikel = artikel::limit(4)->orderBy('created_at','desc')->get();
        return view('home', compact('slider', 'paket', 'haji', 'umroh', 'artikel'));
    }
}
