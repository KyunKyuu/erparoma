<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use SoftDeletes;
    protected $table = 'suppliers';
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];
    protected $dates = ['deleted_at'];
}
