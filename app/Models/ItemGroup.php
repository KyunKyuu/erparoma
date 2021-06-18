<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ItemGroup extends Model
{
    use SoftDeletes;
    protected $table = 'item_groups';
    protected $fillable = [
        'group_name',
        'code_group',
        'status',
        'created_by',
        'deleted_at'
    ];
    protected $dates = ['deleted_at'];
}
