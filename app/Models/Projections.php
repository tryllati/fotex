<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property Carbon $date
 * @property int $empty_place
 * @property int $movie_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property-read Movie $movies
 */
class Projections extends Model
{
    use HasFactory;

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'session_id' => 'integer',
        'data'       => 'array',
    ];

    /**
     * @return HasMany<Movie>
     */
    public function movies(): HasMany
    {
        return $this->hasMany(Movie::class);
    }
}
