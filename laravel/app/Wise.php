<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wise extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "profile_id", // int(10) unsigned
        "name", // varchar(191)
    ];

    // relationships

    public function profile() {
        return $this->belongsTo("App\Profile");
    }
}
