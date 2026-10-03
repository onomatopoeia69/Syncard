<?php

namespace App\Models;

use App\Notifications\customNotifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'google_token',
        'google_refresh_token',
        'google_token_expires_at',
        'email_verified_at',
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
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function getFirstNameAttribute()
    {
        return explode(' ', $this->name)[0];
    }

    public function getLastNameAttribute()
    {
        $arr = explode(' ', $this->name);

        if (count($arr) >= 4) {

            return implode(' ', array_slice(explode(' ', $this->name), -2));

        } else {

            return array_slice(explode(' ', $this->name), -1)[0] ?? '';

        }

    }

    public function getIsEmailVerifiedAttribute(): bool
    {
        return !is_null($this->email_verified_at);
    }


    public function getFormattedCreatedAtAttribute(): string
    {
        return $this->created_at->format('F d, Y');
    }


    public function sendEmailVerificationNotification()
    {
        $this->notify(new customNotifyEmail);
    }

    public function getIsAdminAttribute(): bool
    {
        return $this->role === 'admin';
    }

    public function getIsUserAttribute(): bool
    {
        return $this->role === 'user';
    }

    public function getAssignedRoleAttribute()
    {

        return ucfirst($this->role);

    }

    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }

    public function socials(): HasMany
    {
        return $this->hasMany(Social::class);
    }
    public function childProfiles(): HasMany
    {
        return $this->hasMany(ChildProfile::class, 'user_id');
    }
}
