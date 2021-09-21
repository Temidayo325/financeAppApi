<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function expenseUser()
    {
        return $this->hasManyThrough(User::class, Expense::class, 'user_token', 'user_token', 'user_token', 'user_token');
    }

    public function expenses()
    {
      return $this->hasMany(Expense::class);
    }
}
