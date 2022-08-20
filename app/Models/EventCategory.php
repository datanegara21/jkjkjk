<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'layout',
        'image',
    ];

    public function event_template() {
        return $this->hasMany(EventTemplate::class);
    }
}
