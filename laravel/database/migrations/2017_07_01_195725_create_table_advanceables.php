<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAdvanceables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advanceables', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("profile_id")->unsigned();
            $table->foreign("profile_id")->references("id")->on("profiles");
            $table->string("name");
            $table->smallInteger("rating")->unsigned()->default(2);
            $table->smallInteger("pass_count")->unsigned()->default(0);
            $table->smallInteger("fail_count")->unsigned()->default(0);
            $table->enum("type", ["ability", "skill"])->default("skill");
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
        Schema::table("advanceables", function(Blueprint $table) {
            $table->dropForeign(["profile_id"]);
        });

        Schema::dropIfExists('advanceables');
    }
}
