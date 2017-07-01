<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableConditions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conditions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("profile_id")->unsigned();
            $table->foreign("profile_id")->references("id")->on("profiles");

            $table->integer("condition_type_id")->unsigned();
            $table->foreign("condition_type_id")->references("id")->on("condition_types");
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
        Schema::table("conditions", function(Blueprint $table) {
            $table->dropForeign(["profile_id"]);
            $table->dropForeign(["condition_type_id"]);
        });

        Schema::dropIfExists('conditions');
    }
}
