<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Liked extends Model
{
    use HasFactory;

    protected $fillable = ['profile_id', 'event_id'];

    public function profile() {
        return $this->belongsTo(Profile::class);
    }
    public function event() {
        return $this->belongsTo(Event::class);
    }
}
