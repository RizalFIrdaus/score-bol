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
        Schema::create('classement', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_club");
            $table->integer("match");
            $table->integer("win");
            $table->integer("draw");
            $table->integer("lose");
            $table->integer("goal_win");
            $table->integer("goal_lose");
            $table->integer("point");
            $table->timestamps();
            $table->foreign("id_club")->references("id")->on("club")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classement');
    }
};
