<?php
namespace Bageur\Artikel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Bageur\Artikel\model\artikel;
use Bageur\Artikel\model\komen;
use Bageur\Artikel\Processors\UploadProcessor;
use Validator;
class KomenController extends Controller
{

    public function index(Request $request)
    {
       $query = komen::with(['artikel'])->datatable($request);
       return $query;
    }

     public function store(Request $request)
    {
        $rules      = [
                    ];
                    
        $messages   = [];
        $attributes = [];

        $validator = Validator::make($request->all(), $rules,$messages,$attributes);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response(['status' => false ,'error'    =>  $errors->all()], 200);
        }else{
            $artikel                        = new komen;
            $artikel->artikel_id            = $request->artikel_id;
            $artikel->komen_id              = $request->komen_id;
            $artikel->user_id               = $request->user_id;
            $artikel->text                  = $request->text;
            $artikel->nama_artikel          = $request->nama_artikel;
            $artikel->nama                  = $request->nama;
            $artikel->email                 = $request->email;
            $artikel->website               = $request->website;
            $artikel->save();
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
        return komen::with(['artikel'])->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules    	= [
                    ];
                    
        $messages 	= [];
        $attributes = [];

        $validator = Validator::make($request->all(), $rules,$messages,$attributes);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response(['status' => false ,'error'    =>  $errors->all()], 200);
        }else{
            $artikel              			= komen::findOrFail($id);
            $artikel->artikel_id            = $request->artikel_id;
            $artikel->komen_id              = $request->komen_id;
            $artikel->user_id               = $request->user_id;
            $artikel->text                  = $request->text;
            $artikel->nama_artikel          = $request->nama_artikel;
            $artikel->nama                  = $request->nama;
            $artikel->email                 = $request->email;
            $artikel->website               = $request->website;
            $artikel->save();
            return response(['status' => true ,'text'    => 'has input'], 200); 
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
          $delete = komen::findOrFail($id);
          $delete->delete();
          return response(['status' => true ,'text'    => 'has deleted'], 200); 
    }

}