<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\reward;
use Validator;
use Bageur\Slider\Processors\UploadProcessor;

class rewardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = reward::datatable($request);
        return $query;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules      = [
            'judul'                  => 'required',
            'caption'                => 'required',
            'gambar'                 => 'nullable|mimes:jpg,jpeg,png|max:1000',
          ];

        $messages   = [];
        $attributes = [];

        $validator = Validator::make($request->all(), $rules,$messages,$attributes);
        if ($validator->fails()) {
        $errors = $validator->errors();
        return response(['status' => false ,'error'    =>  $errors->all()], 200);
        }else{
        $reward                          = new reward;
        $reward->judul                   = $request->judul;
        $reward->caption                 = $request->caption;
        if($request->file('gambar') != null){
            $upload                     = UploadProcessor::go($request->file('gambar'),'reward');
            $reward->gambar             = $upload;
        }
        $reward->save();
        return response(['status' => true ,'text'    => 'has input'], 200); 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return reward::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
       $reward = reward::get();
       return view('rewards', compact('reward'));
    }
    public function update(Request $request, $id)
    {
        $rules      = [
            'judul'                  => 'required',
            'caption'                => 'required',
            'gambar'                 => 'nullable|mimes:jpg,jpeg,png|max:1000',
          ];

        $messages   = [];
        $attributes = [];

        $validator = Validator::make($request->all(), $rules,$messages,$attributes);
        if ($validator->fails()) {
        $errors = $validator->errors();
        return response(['status' => false ,'error'    =>  $errors->all()], 200);
        }else{
        $reward                          = reward::findOrFail($id);
        $reward->judul                   = $request->judul;
        $reward->caption                 = $request->caption;
        if($request->file('gambar') != null){
            $upload                     = UploadProcessor::go($request->file('gambar'),'reward');
            $reward->gambar             = $upload;
        }
        $reward->save();
        return response(['status' => true ,'text'    => 'has update'], 200); 
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reward                          = reward::findOrFail($id);
        $reward->delete();
        return response(['status' => true ,'text'    => 'has deleted'], 200); 
    }
}
