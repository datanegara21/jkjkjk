<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = ['profile_from', 'profile_to', 'message', 'link', 'icon', 'reader_at'];
    protected $nullable = ['profile_from', 'reader_at'];

    public function from() {
        return $this->belongsTo(Profile::class);
    }
    public function to() {
        return $this->belongsTo(Profile::class);
    }
}
