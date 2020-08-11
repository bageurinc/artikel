<?php
namespace Bageur\Artikel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Bageur\Artikel\model\author;
use Bageur\Artikel\Processors\UploadProcessor;
use Validator;
class AuthorController extends Controller
{

    public function index(Request $request)
    {
       $query = author::datatable($request);
       return $query;
    }

    public function store(Request $request)
    {
        $rules    	= [
                        'nama'		     		=> 'required|unique:bgr_author|min:3',
                        'gambar'                => 'nullable|mimes:jpg,jpeg,png|max:1000'
                    ];

        $messages 	= [];
        $attributes = [];

        $validator = Validator::make($request->all(), $rules,$messages,$attributes);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response(['status' => false ,'error'    =>  $errors->all()], 200);
        }else{
            $author              			= new author;
            $author->nama	                = $request->nama;
            $author->nama_seo	       		= Str::slug($request->nama);
            if($request->file('gambar') != null){
                $upload                     = UploadProcessor::go($request->file('gambar'),'artikel');
                $artikel->foto              = $upload;
            }
            $author->save();
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
        return author::findOrFail($id);
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
                        'nama'                  => 'required|unique:bgr_author,nama,'.$id.',id|min:2',
                        'gambar'                => 'nullable|mimes:jpg,jpeg,png|max:1000'
                      ];

        $messages   = [];
        $attributes = [];

        $validator = Validator::make($request->all(), $rules,$messages,$attributes);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response(['status' => false ,'error'    =>  $errors->all()], 200);
        }else{
            $author                       = author::findOrFail($id);
            $author->nama                 = $request->nama;
            $author->nama_seo             = Str::slug($request->nama);
            if($request->file('gambar') != null){
                $upload                     = UploadProcessor::go($request->file('gambar'),'artikel');
                $artikel->foto              = $upload;
            }
            $author->save();
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
          $delete = author::findOrFail($id);
          $delete->delete();
          return response(['status' => true ,'text'    => 'has deleted'], 200); 
    }

}