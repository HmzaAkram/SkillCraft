<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use HasApiTokens, HasFactory, Notifiable;

    
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin', // From your migrations (e.g., add_is_admin_to_users_table.php)
        // Add other fields if present, e.g., 'profile_photo', 'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'is_admin' => 'boolean', // If you have an is_admin flag
    ];

    // Relationships
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_user'); // Pivot table from your migrations (course_user.php)
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function progress()
    {
        return $this->hasMany(Progress::class);
    }

    public function certifications()
    {
        return $this->hasMany(Certification::class);
    }

    // Add any custom methods, e.g., for admin check
    public function isAdmin()
    {
        return $this->is_admin;
    }



}