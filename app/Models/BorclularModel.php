<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorclularModel extends Model
{
    use HasFactory;
    protected $primaryKey='borclu_id';
    protected $table='Borclular';
    protected $fillable=['borclu_ad','borclu_soyad','borclu_telefon','borclu_adres','borclu_kurum','toplam_tl_borc','toplam_dolar_borc'];

    
}
