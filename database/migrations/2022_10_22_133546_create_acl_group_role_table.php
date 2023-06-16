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
        Schema::create('acl_group_role', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('role_id')->comment('Fk -> acl_roles');
            $table->unsignedBigInteger('group_permission_id')->comment('Fk -> acl_group_permission.id');
            $table->integer('domain_id')->default(0)->comment('Fk -> domains.id, 0 - all domains(tenants)');
            $table->timestamps();

            $table->foreign('role_id')->references('id')->on('acl_roles');
            $table->foreign('group_permission_id')->references('id')->on('acl_group_permission');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acl_group_role');
    }
};
