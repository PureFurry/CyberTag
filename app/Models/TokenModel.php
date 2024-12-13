<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TokenModel extends Model
{
    use HasFactory;

    // Explicitly set the table name
    protected $table = 'token_models';

    // Allow mass assignment for the 'user_token' column
    protected $fillable = [
        'user_token',
    ];
}
