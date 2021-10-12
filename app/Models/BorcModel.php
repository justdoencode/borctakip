<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorcModel extends Model
{
    use HasFactory;

    protected $table='borclar';
    protected $fillable=["borclu","borc_baslangic_tarihi","borc_bitis_tarihi","para_turu","borc_miktari","aciklama"];
}
