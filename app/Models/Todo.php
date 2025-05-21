<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Todo extends Model
{
    use HasFactory;

    protected $table = 'todos';
    protected $primaryKey = 'todo_id';
    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'task',
        'due_date',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
