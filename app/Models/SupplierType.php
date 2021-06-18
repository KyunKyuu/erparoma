<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SupplierType extends Model
{
     use SoftDeletes;
    protected $table = 'supplier_types';
    protected $fillable = [
        'type_name',
        'status',
        'created_by',
        'deleted_at'
    ];
    protected $dates = ['deleted_at'];
}
