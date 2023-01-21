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
        Schema::table('class', function (Blueprint $table) {
            
            //teacher_id: column yg nak ditambah 
            $table->unsignedBigInteger('teacher_id')->after('name')->nullable();

            //Dalam CLASS TABLE, jadikan TEACHER ID sbg FK (PK dlm CLASS TABLE)
            //references adalah nama column dlm TEACHERS TABLE
            //on TEACHERS TABLE
            //onDelete, users/students tak boleh delete TEACHER ID
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('class', function (Blueprint $table) {
            //
            $table->dropForeign(['teacher_id']);
            $table->dropColumn('teacher_id');
        });
    }
};
