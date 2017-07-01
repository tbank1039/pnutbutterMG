<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProfiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("campaign_id")->unsigned();
            $table->foreign("campaign_id")->references("id")->on("campaigns");
            $table->integer("user_id")->unsigned()->nullable();
            $table->foreign("user_id")->references("id")->on("users");
            $table->string("name", 64);
            $table->smallInteger("age")->nullable();
            $table->string("home", 64)->nullable();
            $table->string("cloak_color", 64)->nullable();
            $table->string("guard_rank", 64)->nullable();
            $table->text("belief")->nullable();
            $table->text("instinct")->nullable();
            $table->string("parents")->nullable();
            $table->string("senior_artisan")->nullable();
            $table->string("mentor")->nullable();
            $table->string("friend")->nullable();
            $table->string("enemy")->nullable();
            $table->smallInteger("fate_points")->unsigned()->default(1);
            $table->smallInteger("persona_points")->unsigned()->default(1);
            $table->enum("status", ["alive", "dead", "removed"])->default("alive");
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
        Schema::table("profiles", function(Blueprint $table) {
            $table->dropForeign(["campaign_id"]);
            $table->dropForeign(["user_id"]);
        });
        Schema::dropIfExists('profiles');
    }
}
