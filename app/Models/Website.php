<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Website extends Model
{

    protected $fillable = ['name', 'url'];

    public function website()
    {
        return $this->belongsToMany(Website::class);
    }

    public function posts()
{
    return $this->hasMany(Post::class);
}

public function subscribers()
{
    return $this->hasMany(Subscriber::class);
}
}
