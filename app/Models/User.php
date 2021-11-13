<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Verification;
use Tymon\JWTAuth\Contracts\JWTSubject;
class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_token',
        'phone',
        'verifyCode',
        'gender'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function expenses()
    {
      return $this->hasMany(Expense::class, 'user_token', 'user_token');
    }

    public function verification()
    {
      return $this->hasOne(Verification::class, 'user_token', 'user_token');
    }

   public function authorizations()
   {
      return $this->hasOne(Authorization::class, 'user_token', 'user_token');
   }

   public function getJWTIdentifier() {
      return $this->getKey();
   }

   public function getJWTCustomClaims() {
        return [];
    }
}
