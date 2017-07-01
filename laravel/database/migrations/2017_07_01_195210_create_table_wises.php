<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableWises extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wises', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("profile_id")->unsigned();
            $table->foreign("profile_id")->references("id")->on("profiles");
            $table->string("name");
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
        Schema::table("wises", function(Blueprint $table) {
            $table->dropForeign(["profile_id"]);
        });

        Schema::dropIfExists('wises');
    }
}
