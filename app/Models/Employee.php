<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    //
    use SoftDeletes;
    protected $table = 'employee';
    protected $fillable = [
        'full_name',
        'short_name',
        'birth_place',
        'birth',
        'status_married_id',
        'religion',
        'address',
        'postal_code',
        'country_id',
        'province_id',
        'city_id',
        'district_id',
        'village_id',
        'telepon',
        'email',
        'division_id',
        'major_id',
        'branch_id',
        'clasification_id',
        'bank_name',
        'bank_rekening_number',
        'bank_owner',
        'status',
        'photo',
        'deleted_at',
        'created_by',
    ];
    protected $dates = ['deleted_at'];
}
