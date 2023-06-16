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
        Schema::create('google_geo_id', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('criteria_id')->default(0)->comment("Criteria ID");
            $table->bigInteger('parent_id')->default(0)->comment("Parent ID");
            $table->string('name')->comment("Name");
            $table->text('canonical_name')->comment("Canonical name");
            $table->string('country_code')->comment("Country Code");
            $table->string('target_type')->comment("Target Type");
            $table->string('status')->comment("Status");
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
        Schema::dropIfExists('google_geo_id');
    }
};
