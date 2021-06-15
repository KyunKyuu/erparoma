<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{
    //
    use SoftDeletes;
    protected $table = 'section';
    protected $fillable = [
        'section_name',
        'description',
        'icon_add',
        'status',
        'created_by',
        'deleted_at'
    ];
    protected $dates = ['deleted_at'];
}
