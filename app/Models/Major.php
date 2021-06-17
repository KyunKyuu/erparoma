<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Major extends Model
{
    //
    use SoftDeletes;
    protected $table = 'majors';
    protected $fillable = [
        'major_name',
        'created_by',
        'deleted_at'
    ];
    protected $dates = ['deleted_at'];
}
