<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'rawg_id',
        'name',
        'description',
        'cover_url',
        'platforms',
        'release_date',
        'status',
    ];

    public function developers()
    {
        return $this->belongsToMany(Developer::class);
    }

    public function publishers()
    {
        return $this->belongsToMany(Publisher::class);
    }
}
