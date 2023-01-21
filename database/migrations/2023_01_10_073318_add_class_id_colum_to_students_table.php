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
        Schema::table('students', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('class_id')->after('nis')->required();
            //Dalam STUDENTS TABLE, jadikan CLASS ID sbg FK (PK dlm CLASS TABLE)
            //references adalah nama column dlm CLASS TABLE
            //on CLASS TABLE
            //onDelete, users/students tak boleh delete CLASS ID
            $table->foreign('class_id')->references('id')->on('class')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            //
            $table->dropForeign(['class_id']);
            $table->dropColumn('class_id');
        });
    }
};
