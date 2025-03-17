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
 * @property-read Projection $projections
 */
class Movie extends Model
{
    use HasFactory;

    const COVER_IMAGE_PATH =  'images/movies/cover';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array<string>|bool
     */
    protected $guarded = [];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['image_url'];

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
     * Merge cover image and file path
     *
     * @return string
     */
    public function getImageUrlAttribute(): string
    {
        return asset(self::COVER_IMAGE_PATH . DIRECTORY_SEPARATOR .$this->cover_image);
    }

    /**
     * @return BelongsTo<Projection, Movie>
     */
    public function projection(): BelongsTo
    {
        return $this->belongsTo(Projection::class, 'movie_id', 'id');
    }
}
