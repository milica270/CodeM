<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Solution;

class Problem extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'content',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function solutions() {
        return $this->hasMany(Solution::class);
    }
}
