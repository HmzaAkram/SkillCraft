<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'video'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function progress()
    {
        return $this->hasMany(Progress::class);
    }

    public function certifications()
    {
        return $this->hasMany(Certification::class);
    }

    public function mcqs()
    {
        return $this->hasMany(Mcq::class);
    }
}