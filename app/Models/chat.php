<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chat extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_khach_hang',
        'noi_dung_KH',
        'noi_dung_admin'
    ];
}
