<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Problem;
use App\Models\Solution;
use App\Models\Friendship;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'bio',
        'image',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /*public function getImageURL() {
        if($this->image) {
            return url('storage/' . $this->image);
        }
        return "https://e7.pngegg.com/pngimages/178/595/png-clipart-user-profile-computer-icons-login-user-avatars-monochrome-black-thumbnail.png";
    }*/

    public function getImageURL() {
        if($this->image) {
            return asset($this->image);
        }
        return "https://e7.pngegg.com/pngimages/178/595/png-clipart-user-profile-computer-icons-login-user-avatars-monochrome-black-thumbnail.png";
    }

    public function problems() {
        return $this->hasMany(Problem::class);
    }

    public function solutions() {
        return $this->hasMany(Solution::class);
    }

    public function friendships1()
    {
        return $this->hasMany(Friendship::class, 'user_id');
    }

    public function friendships2()
    {
        return $this->hasMany(Friendship::class, 'friend_id');
    }

    public function showFriendRequestsCount() {
        $user = auth()->user();
        $friendRequestsCount = $user->friendships2()->where('accepted', false)->count();
        return $friendRequestsCount;
    }

    public function showFriendCount() {
        $user = auth()->user();
        $friendCount = $user->friendships1()->where('accepted', true)->count();
        $friendCount += $user->friendships2()->where('accepted', true)->count();
        return $friendCount;
    }

    public function likes() {
        return $this->belongsToMany(Solution::class, 'solution_like')->withTimestamps();
    }

    public function likesSolution(Solution $solution) {
        return $this->likes()->where('solution_id',$solution->id)->exists();
    }

    public function getTotalLikesCount() {
        $solutions = $this->solutions;
        
        $totalLikesCount = 0;

        foreach ($solutions as $solution) {
            $totalLikesCount += $solution->likes()->count();
        }
    
        return $totalLikesCount;
    }
}
