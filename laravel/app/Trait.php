<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trait extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "profile_id", // int(10) unsigned
        "name", // varchar(191)  
        "trait_level", // smallint(5) unsigned default 2
        "checks", // smallint(5) unsigned default 0
    ];

    // relationships

    public function profile() {
        return $this->belongsTo("App\Profile");
    }
}
