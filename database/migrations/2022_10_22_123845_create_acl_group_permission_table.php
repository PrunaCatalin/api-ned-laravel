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
        Schema::create('acl_group_permission', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("operation_id")->comment("Fk -> acl_operations.id");
            $table->unsignedBigInteger("permission_module_id")->comment("Fk -> acl_permission_module_id.id");
            $table->timestamps();

            $table->foreign("operation_id")->references('id')->on("acl_operations");
            $table->foreign("permission_module_id")->references('id')
                ->on("acl_modules")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acl_group_permission');
    }
};
