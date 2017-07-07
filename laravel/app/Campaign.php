<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "gm_id", 
        "title",
        "description"
    ];

    // relationships
    public function gm() {
        return $this->belongsTo("App\User");
    }

    public function profiles() {
        return $this->hasMany("App\Profile");
    }

    // query scopes
    public function scopeAssociatedToUser($query, User $user) {
        return $query->where("gm_id", $user->id)->orWhereHas("profiles", function($q) use ($user) {
            return $q->where("user_id", $user->id);
        });
    }
}
