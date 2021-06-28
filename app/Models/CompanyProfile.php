<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class CompanyProfile extends Model
{
     //
    use SoftDeletes;
    protected $table = 'company_profile';
    protected $fillable = [
        'name',
        'bussines_type',
        'npwp_number',
        'address_1',
        'address_2',
        'email',
        'telepon_1',
        'telepon_2',
        'fax',
        'postal_code',
        'country',
        'province_id',
        'regency_id',
        'district_id',
        'village_id',
        'bank_name',
        'bank_rekening_number',
        'bank_owner',
        'photo',
        'created_by',
        'status',
        'deleted_at'
    ];
    protected $dates = ['deleted_at'];

    
}
