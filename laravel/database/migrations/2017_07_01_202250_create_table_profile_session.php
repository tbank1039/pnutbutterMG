<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProfileSession extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_session', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("profile_id")->unsigned();
            $table->foreign("profile_id")->references("id")->on("profiles");
            $table->integer("session_id")->unsigned()->nullable();
            $table->foreign("session_id")->references("id")->on("sessions");
            $table->text("goal")->nullable();
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
        Schema::table("profile_session", function(Blueprint $table) {
            $table->dropForeign(["profile_id"]);
            $table->dropForeign(["session_id"]);
        });

        Schema::dropIfExists('profile_session');
    }
}
