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
        Schema::create('customer_companies', function (Blueprint $table) {
            $table->foreignId('customer_id')->constrained()->onDelete('cascade');
            $table->integer('city_id')->comment("FK -> generic_city");
            $table->foreignId('city_id')->constrained('generic_cities')->comment("FK -> generic_cities");
            $table->foreignId('county_id')->constrained('generic_county')->comment("FK -> generic_country");

            $table->string('company_name')->comment("Company name");
            $table->string('prefix_code')->default("RO")->comment("It's refer to prefix of CUI");
            $table->integer('cui_code')->comment("Only number of cui");
            $table->string('commerce_reg_letter')->comment("Can be J / F / C or nothing");
            $table->string('county_code')->comment("Can start from 1 to 44 , or 50  to 52");
            $table->string('company_year')->comment("Company year");
            $table->string('bank_name')->comment("Company bank name");
            $table->string('iban_account')->comment("Company Bank Account");

            $table->string('company_address');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_companies');
    }
};
