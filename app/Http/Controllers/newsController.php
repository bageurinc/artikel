<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Bageur\Artikel\model\artikel;

class newsController extends Controller
{
    public function index(Request $request)
    {
        $request['sort_by'] = 'created_at.desc';
        $artikel = artikel::datatable($request);
        return view('news',compact('artikel'));
    }
    public function detailartikel($id,$any)
    {
        $find    = artikel::findOrfail($id);
        return view('detail-artikel',compact('find'));
    }
}
