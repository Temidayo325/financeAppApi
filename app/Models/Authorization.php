<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Authorization extends Model
{
    use HasFactory;

    protected $fillable = [
      'code',
      'last4',
      'card_type',
      'user_token'
   ];

   public function user()
   {
      return $this->belongsTo(User::class, 'user_token', 'user_token');
   }
}
