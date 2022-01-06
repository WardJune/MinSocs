<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'content'];
    protected $withCount = ['likes', 'comments'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes', 'post_id', 'user_id');
    }

    public function likesCount()
    {
        if ($this->likes_count == 0) {
            return '';
        }

        return $this->likes_count;
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function commentsCount()
    {
        if ($this->comments_count == 0) {
            return '';
        }

        return $this->comments_count;
    }
}
