<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reward extends Model
{
    protected $appends = [
        'caption_limit', 'img'
    ];
    public function getImgAttribute()
    {
        return url('storage/reward/'.$this->gambar);
    }
    public function getCaptionLimitAttribute() {
        return \Str::words(strip_tags($this->caption),25);
    } 
    public function scopeDatatable($query,$request,$page=12)
    {
        $search       = ["judul"];
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

        if($request->get == 'all'){
            return $query->get();
        }else{
                return $query->paginate($page);
        }

    }
}
