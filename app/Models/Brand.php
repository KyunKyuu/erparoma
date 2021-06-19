<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    //
    use SoftDeletes;
    protected $table = 'brand';
    protected $fillable = [
        'merk_name',
        'code',
        'status',
        'created_by',
        'deleted_at'
    ];
    protected $dates = ['deleted_at'];
}