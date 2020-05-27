<?php
namespace Bageur\Artikel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Bageur\Artikel\model\kategori;
use Bageur\Artikel\Processors\UploadProcessor;
use Validator;
class kategoriController extends Controller
{

    public function index(Request $request)
    {
       $query = kategori::datatable($request);
       return $query;
    }

    public function store(Request $request)
    {
        $rules    	= [
                        'nama'		     		=> 'required|unique:bgr_kategori|min:3',
                    ];

        $messages 	= [];
        $attributes = [];

        $validator = Validator::make($request->all(), $rules,$messages,$attributes);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response(['status' => false ,'error'    =>  $errors->all()], 200);
        }else{
            $kategori              			= new kategori;
            $kategori->nama	                = $request->nama;
            $kategori->nama_seo	       		= Str::slug($request->nama);
            $kategori->save();
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
        return kategori::findOrFail($id);
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
        $rules      = [
                        'nama'                  => 'required|unique:bgr_kategori,nama,'.$id.',id|min:2',
                      ];

        $messages   = [];
        $attributes = [];

        $validator = Validator::make($request->all(), $rules,$messages,$attributes);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response(['status' => false ,'error'    =>  $errors->all()], 200);
        }else{
            $kategori                       = kategori::findOrFail($id);
            $kategori->nama                 = $request->nama;
            $kategori->nama_seo             = Str::slug($request->nama);
            $kategori->save();
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
          $delete = kategori::findOrFail($id);
          $delete->delete();
          return response(['status' => true ,'text'    => 'has deleted'], 200); 
    }

}