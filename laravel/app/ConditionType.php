<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConditionType extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "name", // varchar(64)
        "description", // text
    ];

    // relationships

    public function profiles() {
        return $this->hasMany("App\Profile");
    }

    public function conditions() {
    	return $this->hasMany("App\Condition");
    }
}
