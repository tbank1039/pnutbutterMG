<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "campaign_id", // int(10) unsigned
        "user_id", // int(10) unsigned nullable
        "name", // varchar(64)  
        "age", // smallint(6)
        "home", // varchar(64)  
        "cloak_color", // varchar(64)  
        "guard_rank", // varchar(64)  
        "belief", // text
        "instinct", // text
        "parents", // varchar(191)  
        "senior_artisan", // varchar(191)  
        "mentor", // varchar(191)  
        "friend", // varchar(191)  
        "enemy", // varchar(191)  
        "fate_points", // smallint(5) unsigned 
        "persona_points", // smallint(5) unsigned 
        "status",  // enum('alive','dead','removed')
    ];

    // relationships
    public function campaign() {
        return $this->belongsTo("App\Campaign");
    }

    public function user() {
        return $this->belongsTo("App\User");
    }
}
