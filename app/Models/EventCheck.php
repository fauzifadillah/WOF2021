<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventCheck extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'event_id',
    ];
    protected $guarded = [];
}
