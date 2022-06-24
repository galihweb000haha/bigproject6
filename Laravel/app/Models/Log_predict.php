<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log_predict extends Model
{
    use HasFactory;

    protected $fillable = [
        'path',
        'is_predicted',
        'owner',
        'class_predicted',
    ];
}
