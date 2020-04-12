<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'type', 'user_id'
    ];

    public function voteable()
    {
        return $this->morphTo();
    }
}
