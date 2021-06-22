<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\BranchType;

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

    public function branch()
    {
        return $this->belongsTo(BranchType::class, 'type_id')->withTrashed();
    }
}