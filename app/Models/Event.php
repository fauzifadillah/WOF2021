<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function categories(){
        return $this->belongsTo('App\Models\Category');
    }
    public function users(){
        return $this->belongsToMany('App\Models\User', 'event_check', 'event_id', 'user_id');
    }

}
