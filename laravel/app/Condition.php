<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "profile_id", // int(10) unsigned
        "condition_type_id", // int(10) unsigned
    ];

    // relationships

    public function profile() {
        return $this->belongsTo("App\Profile");
    }

    public function conditionType() {
        return $this->belongsTo("App\ConditionType");
    }
}
