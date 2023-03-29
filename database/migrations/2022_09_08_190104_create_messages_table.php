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
        Schema::create('messages', function (Blueprint $table) {
            $table->BigIncrements('id');
            $table->unsignedBigInteger('user_id')->constrained();
            $table->unsignedBigInteger('ToUser_id');
            $table->unsignedBigInteger('report_id');
            $table->string('firstName');
            $table->string('ToUser_firstName');
            $table->text('message');
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
        Schema::dropIfExists('messages');
    }
};
