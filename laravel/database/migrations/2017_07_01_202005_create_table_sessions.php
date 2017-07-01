<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSessions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("campaign_id")->unsigned();
            $table->foreign("campaign_id")->references("id")->on("campaigns");
            $table->string("name");
            $table->text("description")->nullable();
            $table->text("gm_notes")->nullable();
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
        Schema::table("sessions", function(Blueprint $table) {
            $table->dropForeign(["campaign_id"]);
        });
        
        Schema::dropIfExists('sessions');
    }
}
