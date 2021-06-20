<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Branch extends Model
{
    //
    use SoftDeletes;
    protected $table = 'branch';
    protected $fillable = [
        'branch_name',
        'type_id',
        'email',
        'telepon',
        'status',
        'created_by',
        'deleted_at'
    ];
    protected $dates = ['deleted_at'];
}