<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LogStatus extends Model
{
    protected $fillable = ['name', 'name_plural'];

    /**
     * Logs que tienen este estado.
     */
    public function logs(): HasMany
    {
        return $this->hasMany(Log::class);
    }
}
