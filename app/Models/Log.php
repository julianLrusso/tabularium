<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Log extends Model
{
    protected $fillable = [
        'id',
        'game_id',
        'user_id',
        'log_status_id',
        'started_at',
        'finished_at',
        'note',
        'score',
        'platform',
        'spent_hours',
        'rerun',
    ];

    /**
     * Usuario que creó el log.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Juego asociado al log.
     */
    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class);
    }

    /**
     * Estado del log (e.g. jugando, terminado, etc).
     */
    public function status(): BelongsTo
    {
        return $this->belongsTo(LogStatus::class, 'log_status_id');
    }
}
