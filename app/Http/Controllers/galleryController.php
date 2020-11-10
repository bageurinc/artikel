<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Bageur\Album\model\album;
use Bageur\Album\model\albumdetail;

class galleryController extends Controller
{
    public function index(Request $request)
    {
        $album = album::datatable($request);
        return view('gallery',compact('album'));
    }
    public function detailgallery($id,Request $request)
    {
        $album       = album::find($id);
        $albumdetail = albumdetail::where('album_id',$id)->datatable($request);
        return view('detail-gallery',compact('albumdetail','album'));
    }
}
