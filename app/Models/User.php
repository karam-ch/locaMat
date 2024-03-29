<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Arr;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public $table = 'user';

    public function borrows() {
        return $this->hasMany(Borrow::class, 'user_id');
    }

    public function current_borrows() {
        $borrows = $this->borrows()->get();
        return $borrows->filter(function ($borrow) {
            return !$borrow->isReturned();
        })->values();
    }

    public function old_borrows() {
        $borrows = $this->borrows()->get();
        return $borrows->filter(function ($borrow) {
            return $borrow->isReturned();
        })->values();
    }

    protected static function booted () {
        static::deleting(function(User $user) {
            $user->borrows()->delete();
        });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
        'administrator'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
        'administrator' => 'boolean'
    ];
}
