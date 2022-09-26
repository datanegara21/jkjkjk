<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'profile_id',
        'event_template_id',
        'title',
        'image',
        'description',
        'name',
        'date',
        'time',
        'location',
        'map',
        'total',
        'price',
        'start',
        'end',
    ];

    public function event_template() {
        return $this->belongsTo(EventTemplate::class);
    }
    public function profile() {
        return $this->belongsTo(Profile::class);
    }
    public function liked() {
        return $this->hasMany(Liked::class);
    }
    public function join() {
        return $this->hasMany(Join::class);
    }
}
