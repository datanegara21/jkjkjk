<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'image',
        'description',
        'whatsapp',
        'facebook',
        'instagram',
        'twitter',
        'website',
    ];

    protected $nullable = [
        'description',
        'whatsapp',
        'facebook',
        'instagram',
        'twitter',
        'website',
    ];

    public function event() {
        return $this->hasMany(Event::class);
    }
    public function liked() {
        return $this->hasMany(Event::class);
    }
}
