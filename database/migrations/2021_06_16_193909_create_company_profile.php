<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_profile', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('bussines_type');
            $table->char('npwp_number');
            $table->string('address_1');
            $table->string('address_2');
            $table->string('email');
            $table->char('telepon_1');
            $table->char('telepon_2');
            $table->char('fax');
            $table->char('postal_code');
            $table->char('country');
            $table->int('province_id');
            $table->int('regency_id');
            $table->int('district_id');
            $table->int('village_id');
            $table->char('bank_name');
            $table->char('bank_rekening_number');
            $table->string('bank_owner');
            $table->string('photo');
            $table->char('created_by');
            $table->enum('status', [1, 0]);
            $table->timestamp('deleted_at')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_profile');
    }
}
