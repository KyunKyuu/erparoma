<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Color extends Model
{
     //
    use SoftDeletes;
    protected $table = 'colors';
    protected $fillable = [
        'color_name',
        'status',
        'created_by',
        'deleted_at'
    ];
    protected $dates = ['deleted_at'];
}
