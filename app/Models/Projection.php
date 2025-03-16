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
class Projection extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array<string>|bool
     */
    protected $guarded = [];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'id'          => 'integer',
        'date'        => 'datetime',
        'empty_place' => 'integer',
        'movie_id'    => 'integer',
    ];

    /**
     * @return HasMany<Movie>
     */
    public function movies(): HasMany
    {
        return $this->hasMany(Movie::class);
    }
}
