<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create(env('PREFIX_CUSTOM_TABLES') . 'application_links', function (Blueprint $table) {
            $table->id();
            $table->integer("parent")->default(0)->comment("Parent of link");
            $table->integer("position")->default(0)->comment("Order of child /  parent");
            $table->string("name", 64)->comment("Name of link");
            $table->string("href", 256)->comment("Href attribute for link");
            $table->string("icon", 128)->default("")->comment("Class icon");
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
        //
        Schema::dropIfExists(env('PREFIX_CUSTOM_TABLES') . 'application_links');
    }
};
