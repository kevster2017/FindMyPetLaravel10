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
        Schema::create('founds', function (Blueprint $table) {
            $table->BigIncrements('id');
            $table->foreignId('user_id')->constrained(); //Foreign key to link to user database - id of the user
            $table->string('firstName');
            $table->string('surname');
            $table->string('petName')->nullable();
            $table->string('petType');
            $table->integer('petAge')->nullable();
            $table->string('chipNum')->nullable();
            $table->text('description');
            $table->string('town');
            $table->string('postCode');            
            $table->string('img1')->nullable();
            $table->string('img2')->nullable();
            $table->string('img3')->nullable();
            $table->boolean('reunited');
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
        Schema::dropIfExists('founds');
    }
};
