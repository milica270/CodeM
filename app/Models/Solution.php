<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Problem;

class Solution extends Model
{
    use HasFactory;

    protected $fillable = [
        'problem_id',
        'user_id',
        'content',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function problem() {
        return $this->belongsTo(Problem::class);
    }

    public function likes() {
        return $this->belongsToMany(User::class, 'solution_like')->withTimestamps();
    }

}
