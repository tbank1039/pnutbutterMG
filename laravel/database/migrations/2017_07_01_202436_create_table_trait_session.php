<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTraitSession extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trait_session', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("profile_session_id")->unsigned();
            $table->foreign("profile_session_id")->references("id")->on("profile_session");
            $table->integer("trait_id")->unsigned()->nullable();
            $table->foreign("trait_id")->references("id")->on("traits");
            $table->smallInteger("use_count")->unsigned()->default(0);
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
        Schema::table("trait_session", function(Blueprint $table) {
            $table->dropForeign(["profile_session_id"]);
            $table->dropForeign(["trait_id"]);
        });

        Schema::dropIfExists('trait_session');
    }
}
