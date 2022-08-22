<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventTemplate extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_category_id',
        'preview',
        'template',
    ];

    public function event_category(){
        return $this->belongsTo(EventCategory::class);
    }
    public function event() {
        return $this->hasMany(Event::class);
    }
}
