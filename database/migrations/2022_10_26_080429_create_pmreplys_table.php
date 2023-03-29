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
        Schema::create('pmreplys', function (Blueprint $table) {
            $table->BigIncrements('id');
            $table->foreignId('private_message_id')->constrained(); //Foreign key to link to pmreply database - id of the pm
            $table->unsignedBigInteger('FromUser_id');
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
        Schema::dropIfExists('pmreplys');
    }
};
