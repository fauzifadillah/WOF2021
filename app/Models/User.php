<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'facebook_id',
        'google_id',
        'roles_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(){
        return $this->belongsTo('App\Models\Role');
    }

    public function vouchers(){
        return $this->hasMany('App\Models\Event');
    }

    public function leaderboard(){
        return $this->hasOne('App\Models\Leaderboard');
    }

    public function logs(){
        return $this->hasMany('App\Models\Log');
    }

    public function events(){
        return $this->belongsToMany('App\Models\Event', 'event_check', 'user_id', 'event_id');
    }

    public function event_check($eventID){
        return  $this->events->attach($eventID);
    }
}
