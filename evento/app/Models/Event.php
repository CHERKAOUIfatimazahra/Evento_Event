<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    public function users()
    {
        return $this->hasMany(User::class)->withPivot('quantity', 'place');
    }
    public function categories()
    {
        return $this->belongsTo(Category::class);
    }
}
