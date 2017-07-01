<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->insert([
        	"first_name" => "Tyler",
        	"last_name"  => "Bank",
        	"email"      => "tbank1039@gmail.com",
        	"password"   => bcrypt("test1234")
        ]);

        DB::table("users")->insert([
        	"first_name" => "Parker",
        	"last_name"  => "Murphy",
        	"email"      => "parkermur@gmail.com",
        	"password"   => bcrypt("test1234")
        ]);

        DB::table("campaigns")->insert([
        	"gm_id" => 1,
        	"title" => "Sample Campaign #1",
        	"description" => null,
        ]);

        DB::table("profiles")->insert([
        	"user_id" => 2,
        	"campaign_id" => 1,
        	"name" => "Gwendolynn the Wise",
        	"age" => 27,
        	"home" => "Elmas",
        	"cloak_color" => "purple",
        	"guard_rank" => "tenderpaw",
        	"belief" => "All Mice are naturally good.",
        	"instinct" => "Flee at the sight of Snakes.",
        	"parents" => "Jim and Pam",
        	"senior_artisan" => "Dwight",
        	"mentor" => "Michael Scott",
        	"friend" => "Creed",
        	"enemy" => "Angela",
        	"fate_points" => 1,
        	"persona_points" => 1
        ]);

        DB::table("wises")->insert([
        	"profile_id" => 1,
        	"name" => "Turk",
        ]);


        DB::table("advanceables")->insert([
        	"profile_id" => 1,
        	"name" => "Fighter",
        	"type" => "skill"
        ]);

        DB::table("advanceables")->insert([
        	"profile_id" => 1,
        	"name" => "Nature",
        	"type" => "ability"
        ]);

        DB::table("traits")->insert([
        	"profile_id" => 1,
        	"name" => "Generous",
        	"trait_level" => 1,
        ]);

        DB::table("sessions")->insert([
        	"campaign_id" => 1,
        	"name" => "Caravan Crusade",
        	"description" => "The mice escort a caravan but encounter a suspicious figure along the way...",
        	"gm_notes" => "Kirk (npc) will show up an offer his goods if the company chooses to go left in the fork in the road.",
        ]);

        DB::table("profile_session")->insert([
        	"profile_id" => 1,
        	"session_id" => 1,
        	"goal" => "Kill any snakes that come along the way",
        ]);

        DB::table("trait_session")->insert([
        	"profile_session_id" => 1,
        	"trait_id" => 1,
        	"use_count" => 1,
        ]);

        DB::table("condition_types")->insert([
        	"name" => "Hungry/Thirsty",
        	"description" => "-1 to disposition to any conflict.",
        ]);

        DB::table("condition_types")->insert([
        	"name" => "Angry (Ob 2 Will)",
        	"description" => "-1 to disposition for any conflict that uses Will as its base.",
        ]);

        DB::table("condition_types")->insert([
        	"name" => "Tired (Ob 3 Health)",
        	"description" => "-1 to disposition for all conflicts.",
        ]);

        DB::table("condition_types")->insert([
        	"name" => "Injured (Ob 4 Health)",
        	"description" => "-1D to skills, Nature, Will and Health (but not recovery).",
        ]);

        DB::table("condition_types")->insert([
        	"name" => "Sick (Ob 4 Will)",
        	"description" => "-1D to skills, Nature, Will and Health (but not recovery).",
        ]);

        DB::table("conditions")->insert([
        	"profile_id" => 1,
        	"condition_type_id" => 1,
        ]);
    }
}
