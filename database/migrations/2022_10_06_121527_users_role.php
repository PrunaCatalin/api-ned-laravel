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
        Schema::create('users_role', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id")->comment("Fk Users");
            $table->foreign('user_id')->references('id')->on('users');
            $table->string("access_token")->comment("Access Token");
            $table->string("instance_url")->comment("Salesforce ID");
            $table->string("token_type", 64)->comment("Token Type");
            $table->string("signature")->comment("Signature");
            $table->string("profile_id")->comment("Salesforce ID");
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
        //
    }
};
