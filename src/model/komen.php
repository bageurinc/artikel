<?php

namespace Bageur\Artikel\Model;

use Illuminate\Database\Eloquent\Model;
use Bageur\Artikel\Processors\AvatarProcessor;

class kategori extends Model
{
    protected $table = 'bgr_komen_artikel';

    protected $fillable = ['komen_id','user_id','text','artikel_id'];
    
    public function submenu()
    {
    	 return $this->hasMany(kategori::class,'komen_id');
    }
    public function parent()
    {
       return $this->hasOne(kategori::class,'id','komen_id');
    }
    public function artikel()
    {
       return $this->hasOne(artikel::class,'id','artikel_id');
    }
}
