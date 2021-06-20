<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerType extends Model
{
    //
    use SoftDeletes;
    protected $table = 'customer_type';
    protected $fillable = [
        'type_name',
        'created_by',
        'deleted_at'
    ];
    protected $dates = ['deleted_at'];
}