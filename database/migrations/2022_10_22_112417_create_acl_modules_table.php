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
        Schema::create('acl_modules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('module_name')->comment('Module Name');
            $table->string('pretty_name')->comment('Module Pretty Name');
            $table->string('group_name')->comment('Group Module Name');
            $table->unsignedInteger('domain_id')->comment('Tenant id');
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
        Schema::dropIfExists('acl_modules');
    }
};
