<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCampaigns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("gm_id")->unsigned();
            $table->foreign("gm_id")->references("id")->on("users");
            $table->string("title");
            $table->text("description")->nullable();
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
        Schema::table("campaigns", function(Blueprint $table) {
            $table->dropForeign(["gm_id"]);
        });

        Schema::dropIfExists('campaigns');
    }
}
