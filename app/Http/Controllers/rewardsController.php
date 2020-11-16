<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\reward;
use Validator;

class rewardsController extends Controller
{
    public function view()
    {
       $reward = reward::get();
       return view('rewards', compact('reward'));
    }
    public function index(Request $request)
    {
       $query = video::datatable($request);
       return $query;
    }
    public function store(Request $request)
    {
        $rules      = [
            'judul'                  => 'required',
            'caption'                => 'required',
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
        $reward->save();
        return response(['status' => true ,'text'    => 'has input'], 200); 
        }
    }
    public function show($id)
    {
        return video::findOrFail($id);
    }
    public function update(Request $request, $id)
    {
        $rules      = [
                        'judul'                  => 'required',
                        'caption'                => 'required',
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
            $reward->save();
            return response(['status' => true ,'text'    => 'has update'], 200); 
        }
    }
}
