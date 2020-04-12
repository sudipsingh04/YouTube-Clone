<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Channel extends Model implements HasMedia
{
    use HasMediaTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'user_id', 'description', 'image'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function editable()
    {
        if (!auth()->check()) return false;

        return $this->user_id == auth()->user()->id;
    }

    public function image()
    {
        if($this->media->first()){
            return $this->media->first()->getFullUrl('thumb');
        }
        return null;
    }

    public function registerMediaConversions(?Media $media = null)
    {
        $this->addMediaConversion('thumb')
             ->width(100)
             ->height(100);
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }
}
