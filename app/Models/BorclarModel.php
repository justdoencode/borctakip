<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorclarModel extends Model
{
    use HasFactory;

    protected $primaryKey='borc_id';
    protected $table='Borclar';
    protected $fillable=['borclu_id','borc_baslangic_tarihi','borc_bitis_tarihi','para_turu_id','borc_miktari','aciklama'];


    public function getBorclu(){
        return $this->hasOne('App\Models\BorclularModel','borclu_id','borclu_id');
    }

    public function getParaTuru(){
        return $this->hasOne('App\Models\ParaTuruModel','para_id','para_turu_id');
    }
}
