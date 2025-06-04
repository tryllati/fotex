<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $name
 * @property string $task
 * @property int $age
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class TestModel extends Model
{
    use HasFactory;

    protected $table = 'tests';

    protected $guarded = [];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'task' => 'string',
        'age' => 'integer',
    ];
}
