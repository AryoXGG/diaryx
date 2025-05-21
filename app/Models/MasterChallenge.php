<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterChallenge extends Model
{
    use HasFactory;

    protected $primaryKey = 'challenge_id';

    protected $fillable = [
        'title',
        'description',
        'start_date',
        'end_date',
        'status'
    ];
}

