<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BranchType extends Model
{
    //
    use SoftDeletes;
    protected $table = 'branch_type';
    protected $fillable = [
        'type_name',
        'description',
        'created_by',
        'deleted_at'
    ];
    protected $dates = ['deleted_at'];
}