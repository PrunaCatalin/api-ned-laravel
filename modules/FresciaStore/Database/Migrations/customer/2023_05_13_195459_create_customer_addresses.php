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
        Schema::create('customer_addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained()->onDelete('cascade');
            $table->foreignId('city_id')->constrained("generic_cities")->onDelete('cascade');
            $table->foreignId('county_id')->constrained("generic_county")->onDelete('cascade');


            $table->string('person_name')
                ->comment("Person name for delivery");
            $table->string('person_phone')
                ->comment("Person phone for delivery");
            $table->string('person_street_name')
                ->comment("Person street for delivery");
            $table->string('person_street_number')
                ->comment("Person street number for delivery")->nullable();
            $table->string('person_zip_code')
                ->comment("Person zip_code for delivery");
            $table->text('person_additional_info')
                ->comment("Person additional information delivery")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_addresses');
    }
};
