<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorclularModel extends Model
{
    use HasFactory;
    protected $table='borclular';
    protected $fillable=["ad","soyad","telefon","adres","kurum","toplamborc","created_at","updated_at"];
}
