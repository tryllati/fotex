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
     * The attributes that aren't mass assignable.
     *
     * @var array<string>|bool
     */
    protected $guarded = [];

    /**
     * @var array<string, mixed>
     */
    protected $casts = [
        'id'          => 'integer',
        'name'        => 'string',
        'description' => 'string',
        'age_limit'   => 'int',
        'language'    => MovieLanguageTypeEnum::class,
        'cover_image' => 'string',
    ];

    /**
     * @return BelongsTo<Projections, Movie>
     */
    public function projections(): BelongsTo
    {
        return $this->belongsTo(Projections::class);
    }
}
