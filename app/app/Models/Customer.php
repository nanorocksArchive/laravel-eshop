<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';

    const FIRST_NAME = 'firstname';
    const LAST_NAME = 'lastname';
    const PHONE = 'phone';
    const EMAIL = 'email';

    protected $fillable = [
        self::FIRST_NAME,
        self::LAST_NAME,
        self::PHONE,
        self::EMAIL
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
