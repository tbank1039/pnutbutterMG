<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advanceable extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "profile_id", // int(10) unsigned
        "name", // varchar(191)  
        "rating", // smallint(5) unsigned default 2
        "pass_count", // smallint(5) unsigned default 0
        "fail_count", // smallint(5) unsigned default 0 
        "type", // enum ("ability", "skill")
    ];

    // relationships

    public function profile() {
        return $this->belongsTo("App\Profile");
    }
}
