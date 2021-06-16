<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('short_name');
            $table->string('birth_place');
            $table->date('birth');
            $table->enum('status_maried_id', [1, 0]);
            $table->char('string');
            $table->string('address');
            $table->varchar('email');
            $table->char('telepon');
            $table->char('postal_code');
            $table->char('country');
            $table->int('province_id');
            $table->int('regency_id');
            $table->int('district_id');
            $table->int('village_id');
            $table->int('major_id');
            $table->int('division_id');
            $table->int('branch_id');
            $table->int('clasification_id');
            $table->char('bank_name');
            $table->char('bank_rekening_number');
            $table->varchar('bank_owner');
            $table->varchar('photo');
            $table->string('created_by');
            $table->integer('status');
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
        Schema::dropIfExists('employee');
    }
}
