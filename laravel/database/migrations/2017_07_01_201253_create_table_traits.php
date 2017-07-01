<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTraits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traits', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("profile_id")->unsigned();
            $table->foreign("profile_id")->references("id")->on("profiles");
            $table->string("name");
            $table->smallInteger("trait_level")->unsigned()->default(1);
            $table->smallInteger("checks")->unsigned()->default(0);
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
        Schema::table("traits", function(Blueprint $table) {
            $table->dropForeign(["profile_id"]);
        });

        Schema::dropIfExists('traits');
    }
}
