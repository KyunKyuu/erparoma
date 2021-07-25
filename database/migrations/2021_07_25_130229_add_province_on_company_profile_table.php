<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProvinceOnCompanyProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company_profile', function (Blueprint $table) {
            $table->foreignId('province_id');
            $table->foreignId('regency_id');
            $table->foreignId('district_id');
            $table->foreignId('village_id');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('company_profile', function($table) {
            $table->foreignId('province_id');
            $table->foreignId('regency_id');
            $table->foreignId('district_id');
            $table->foreignId('village_id');
        });
    }
}
