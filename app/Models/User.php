<?php

namespace App\Models;

use App\Traits\Uuids;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Faculty;

class User extends Authenticatable
{
    use Uuids, HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    // public $incrementing = false;
    // protected $keyType = 'uuid';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        //'faculty_id',
        // 'name',
        'email',
        'password',
        'status'
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    // protected $with = ['faculty','roles','created_by_user','updated_by_user'];

    //Relationships
    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'faculty_id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_roles', 'user_id', 'role_id');
    }

    public function created_by_user()
    {
        return $this->belongsTo(User::class,'created_by');
    }

    public function updated_by_user()
    {
        return $this->belongsTo(User::class,'updated_by');
    }

    public function created_users()
    {
        return $this->hasMany(User::class, 'created_by');
    }

    public function updated_users()
    {
        return $this->hasMany(User::class, 'updated_by');
    }

}