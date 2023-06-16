<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('system_users_details', function (Blueprint $table) {
            $table->unsignedBigInteger('country_id')->comment('fk generic_countries');
            $table->string('website')->nullable()->comment('Website link');
            $table->string('nif')->comment('Tax Identification Number');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('', function (Blueprint $table) {

        });
    }
};
