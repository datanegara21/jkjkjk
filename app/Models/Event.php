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
        'time',
        'location',
        'total',
        'price',
        'start',
        'end',
    ];

    public function event_template() {
        return $this->belongsTo(EventTemplate::class);
    }
}
