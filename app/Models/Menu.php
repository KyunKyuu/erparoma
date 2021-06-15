<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    //
    use SoftDeletes;
    protected $table = 'menu';
    protected $fillable = [
        'section_id',
        'menu_name',
        'menu_url',
        'description',
        'menu_icon',
        'status',
        'created_by',
        'deleted_at'
    ];
    protected $dates = ['deleted_at'];
}
