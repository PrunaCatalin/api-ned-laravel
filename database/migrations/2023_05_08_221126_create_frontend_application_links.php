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
        Schema::create('frontend_application_links', function (Blueprint $table) {
            $table->id();

            $table->integer("id_parent")->default(0)->comment("Parent of link");
            $table->integer("order_list")->default(0)->comment("Order of link");
            $table->integer("position")->default(0)->comment("Order of child /  parent");
            $table->string("name", 64)->comment("Name of link");
            $table->string("url_seo", 128)->comment("Url Seo");
            $table->string("icon", 128)->default("")->comment("Class icon");
            $table->tinyInteger("is_customer")->default(0)->comment("customer mandatory : 0 -> No , 1 -> Yes");
            $table->tinyInteger("is_active")->default(0)->comment("Is Active : 0 -> No , 1 -> Yes");

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
        Schema::dropIfExists( 'frontend_application_links');
    }
};
