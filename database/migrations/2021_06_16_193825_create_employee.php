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
            $table->char('religion');
            $table->string('address');
            $table->string('email');
            $table->char('telepon');
            $table->char('postal_code');
            $table->char('country');
            $table->integer('province_id');
            $table->integer('regency_id');
            $table->integer('district_id');
            $table->integer('village_id');
            $table->integer('major_id');
            $table->integer('division_id');
            $table->integer('branch_id');
            $table->integer('clasification_id');
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
        Schema::dropIfExists('employee');
    }
}
