<?php

namespace App\Models;

use App\Enums\MovieLanguageTypeEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $age_limit
 * @property MovieLanguageTypeEnum $language
 * @property string $cover_image
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property-read Projections $projections
 */
class Movie extends Model
{
    use HasFactory;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array<string, mixed>
     */
    protected $casts = [
        'session_id' => 'integer',
        'data'       => 'array',
        'language'   => MovieLanguageTypeEnum::class,
    ];

    /**
     * @return BelongsTo<Projections, Movie>
     */
    public function projections(): BelongsTo
    {
        return $this->belongsTo(Projections::class);
    }
}
