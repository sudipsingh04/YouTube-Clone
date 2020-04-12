<?php

namespace App;

use Auth;
use App\Vote;
use App\Channel;
use App\Comment;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'path', 'percentage', 'thumbnail', 'description'
    ];

    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }

    public function editable()
    {
        if (Auth::check()) {
            return $this->channel->user_id == Auth::user()->id;
        }
        return false;
    }

    public function votes()
    {
        return $this->morphMany(Vote::class, 'voteable');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('comment_id')->orderBy('created_at', 'DESC');
    }
}
