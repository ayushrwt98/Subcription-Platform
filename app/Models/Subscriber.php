<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    protected $fillable = ['website_id','email','email_sent'];

    public function subscribers()
    {
        return $this->belongsToMany(Subscriber::class);
    }

    public function website()
    {
        return $this->belongsToMany(Website::class);
    }
}
