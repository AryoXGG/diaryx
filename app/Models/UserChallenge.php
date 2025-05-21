<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserChallenge extends Model
{
    use HasFactory;

    protected $primaryKey = 'user_challenge_id';

    protected $fillable = [
        'user_id',
        'challenge_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function challenge()
    {
        return $this->belongsTo(MasterChallenge::class, 'challenge_id', 'challenge_id');
    }
}

