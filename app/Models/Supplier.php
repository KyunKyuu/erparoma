<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use SoftDeletes;
    protected $table = 'suppliers';
    protected $fillable = [
        'supplier_name',
        'type_id',
        'address',
        'telepon',
        'status',
        'created_by',
        'deleted_at'
    ];
    protected $dates = ['deleted_at'];

    public function type()
    {
        return $this->belongsTo(SupplierType::class, 'type_id')->withTrashed();
    }
}