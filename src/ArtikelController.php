<?php
namespace Bageur\Artikel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Bageur\Artikel\model\artikel;
use Validator;
class ArtikelController extends Controller
{

    public function index(Request $request)
    {
       $query = artikel::with(['kategori','author'])->datatable($request);
       return $query;
    }

     public function store(Request $request)
    {
        $rules      = [
                        'kategori'              => 'required',
                        'penulis'               => 'required',
                        'judul'                 => 'required|unique:bgr_artikel|min:3',
                        'text'                  => 'required|min:3',
                    ];

        if($request->file('gambar') != null){
            $rules['gambar'] = 'base64image|base64max:1000';
        }  
                    
        $messages   = [];
        $attributes = [];

        $validator = Validator::make($request->all(), $rules,$messages,$attributes);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response(['status' => false ,'error'    =>  $errors->all()], 200);
        }else{
            $artikel                        = new artikel;
            $artikel->kategori_id           = $request->kategori;
            $artikel->author_id             = $request->penulis;
            $artikel->judul                 = $request->judul;
            $artikel->judul_seo             = Str::slug($request->judul);
            $artikel->seo_keyword           = @$request->seo_keyword;
            $artikel->seo_deskripsi         = @$request->seo_deskripsi;
            $artikel->tag                   = @$request->tag;
            $artikel->blast_telegram        = @$request->blast_telegram;
            $artikel->blast_whatsapp        = @$request->blast_whatsapp;
            $artikel->blast_email           = @$request->blast_email;
            $artikel->text                  = \Bageur::textarea($request->text);
            if($request->isSchedule == 'Yes'){
              $artikel->publish_at          = $request->tgl_publish;
              $artikel->created_at          = $request->tgl_publish;
            } else{
                $artikel->publish_at          = date('Y-m-d H:i:s');
            }
            if($request->gambar != null){
                $upload                     = \Bageur::base64($request->gambar,'artikel');
                $artikel->gambar            = $upload['up'];
            }
            $artikel->save();

            if($request->isSchedule != 'Yes'){
                if(!empty(env('TOKEN_TELEGRAM'))){
                    \Notification::route('telegram', env('TELEGRAM_CHANNEL'))->notify(new \Bageur\Artikel\Notifications\Go($artikel));
                }
            }
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
        return artikel::with(['kategori','author'])->findOrFail($id);
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
                        'kategori'		     	=> 'required',
                        'penulis'               => 'required',
                        'judul'		     		=> 'required|unique:bgr_artikel,judul,'.$id.',id|min:3',
                        'text'		     		=> 'required|min:3',
                    ];

        if($request->file('gambar') != null){
            $rules['gambar'] = 'mimes:jpg,jpeg,png|max:1000';
        }  
                    
        $messages 	= [];
        $attributes = [];

        $validator = Validator::make($request->all(), $rules,$messages,$attributes);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response(['status' => false ,'error'    =>  $errors->all()], 200);
        }else{
            $artikel              			= artikel::findOrFail($id);
            $artikel->kategori_id           = $request->kategori;
            $artikel->author_id             = $request->penulis;
            $artikel->judul                 = $request->judul;
            $artikel->judul_seo             = Str::slug($request->judul);
            $artikel->seo_keyword           = @$request->seo_keyword;
            $artikel->seo_deskripsi         = @$request->seo_deskripsi;
            $artikel->tag                   = @$request->tag;
            $artikel->blast_telegram        = @$request->blast_telegram;
            $artikel->blast_whatsapp        = @$request->blast_whatsapp;
            $artikel->blast_email           = @$request->blast_email;
            $artikel->text                  = \Bageur::textarea($request->text);
            if($request->isSchedule == 'Yes'){
              $artikel->publish_at          = $request->tgl_publish;
              $artikel->updated_at          = $request->tgl_publish;
            }
            if($request->gambar != null){
                $upload                     = \Bageur::base64($request->gambar,'artikel');
                $artikel->gambar            = $upload['up'];
            }
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
          $delete = artikel::findOrFail($id);
          $delete->delete();
          return response(['status' => true ,'text'    => 'has deleted'], 200); 
    }

    public function getartikel($id)
    {
        $company = \Bageur\Company\Model\company::first();
        $data = artikel::find($id);
        $satu = \Bageur\Artikel\model\artikel::inRandomOrder()->where('id','!=',$id)->first();  
        $dua  = \Bageur\Artikel\model\artikel::inRandomOrder()->whereNotIn('id',[$id,$satu->id])->first();
        return response()->json([
            'company' => $company,
            'data' => $data,
            'satu' => $satu,
            'dua' => $dua,
        ]);
    }
}