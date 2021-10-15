<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParaTuruModel extends Model
{
    use HasFactory;

    protected $primaryKey='para_id';
    protected $table='ParaTuru';
    protected $fillable=['para_adi'];
}
