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
        Schema::create('match', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("klub_id_1");
            $table->unsignedBigInteger("score_1");
            $table->unsignedBigInteger("klub_id_2");
            $table->unsignedBigInteger("score_2");
            $table->foreign("klub_id_1")->references("id")->on("club")->onDelete("cascade");
            $table->foreign("klub_id_2")->references("id")->on("club")->onDelete("cascade");
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
        Schema::dropIfExists('match');
    }
};
