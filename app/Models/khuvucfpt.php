<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class khuvucfpt extends Model
{
    use HasFactory;
    protected $fillable = [
        'slug',
        'ten_khu_vuc'
    ];
    public function thanhpho() {
        return $this->hasMany(thanhpho::class, 'id_khu_vuc');
    }
}
