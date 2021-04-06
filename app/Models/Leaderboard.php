<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leaderboard extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_point',
        'current_point',
    ];
    protected $guarded = [];

    public function users(){
        return $this->belongsTo('App\Models\User');
    }
}
