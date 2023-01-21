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
        Schema::table('users', function (Blueprint $table) {

            //role_id: column yg nak ditambah 
            $table->unsignedBigInteger('role_id')->after('email');

            //Dalam CLASS TABLE, jadikan ROLE ID sbg FK (PK dlm ROLES TABLE)
            //references adalah nama column dlm ROLES TABLE
            //on ROLES TABLE
            //onDelete, users tak boleh delete ROLE ID
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropForeign(['role_id']);
            $table->dropColumn('role_id');
        });
    }
};
