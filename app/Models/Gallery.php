<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'descrtiption',
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Images()
    {
        return $this->hasMany(Image::class);
    }

    public function Comments()
    {
        return $this->hasMany(Comment::class);
    }
    
}
