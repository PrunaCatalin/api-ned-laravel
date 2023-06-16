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
        Schema::create('acl_operations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('group')->nullable()->comment("Parent of child");
            $table->integer('priority')->default(0)->comment('Used for hierarchy');
            $table->string('operation_name')->comment("Can be (delete, update, restore, view) etc...");
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
        Schema::dropIfExists('acl_operations');
    }
};
