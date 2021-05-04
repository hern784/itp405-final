<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;
    protected $table = 'businesses';

    protected $fillable = [
        'current',
    ];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
