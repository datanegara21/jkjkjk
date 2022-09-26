<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Join extends Model
{
    use HasFactory;

    protected $fillable = ['profile_id', 'event_id', 'email', 'name', 'token', 'paid', 'confirmed'];

    public function profile() {
        return $this->belongsTo(Profile::class);
    }
    public function event() {
        return $this->belongsTo(Event::class);
    }
}
