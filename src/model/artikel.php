<?php

namespace Bageur\Artikel\Model;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Bageur\Artikel\Processors\AvatarProcessor;

class artikel extends Model
{
    protected $table   = 'bgr_artikel';
    protected $appends = ['avatar','text_limit','judul_limit'];

    public function getAvatarAttribute()
    {
            return AvatarProcessor::get($this->judul,@$this->gambar);
    }   
     public function getTextLimitAttribute() {
         return Str::words(nl2br(strip_tags($this->text)),25);
    }    

    public function getJudulLimitAttribute() {
         return Str::words(strip_tags($this->judul),5,' ...');
    }
    public function scopeDatatable($query,$request,$page=12)
    {
          $search       = ["judul",'tag','text'];
          $searchqry    = '';

        $searchqry = "(";
        foreach ($search as $key => $value) {
            if($key == 0){
                $searchqry .= "lower($value) like '%".strtolower($request->search)."%'";
            }else{
                $searchqry .= "OR lower($value) like '%".strtolower($request->search)."%'";
            }
        } 
        $searchqry .= ")";
        if(@$request->sort_by){
            if(@$request->sort_by != null){
            	$explode = explode('.', $request->sort_by);
                 $query->orderBy($explode[0],$explode[1]);
            }else{
                  $query->orderBy('created_at','desc');
            }

             $query->whereRaw($searchqry);
        }else{
             $query->whereRaw($searchqry);
        }
        if(@$request->category){
             $query->where('kategori_id',$request->category);
        }
        if($request->get == 'all'){
            return $query->get();
        }else{
                return $query->paginate($page);
        }

    }
    public function kategori()
    {
      return $this->hasOne('Bageur\Artikel\model\kategori','id','kategori_id');
    }
}
