<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * App\Models\Field
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Field newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Field newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Field query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $fieldable_type
 * @property int $fieldable_id
 * @property string $identifier
 * @property string $key
 * @property string $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Field whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Field whereFieldableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Field whereFieldableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Field whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Field whereIdentifier($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Field whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Field whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Field whereValue($value)
 * @property-read Model|\Eloquent $fieldable
 */
class Field extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'fieldable_type',
        'fieldable_id',
        'identifier',
        'key',
        'value',
    ];

    public function fieldable(): MorphTo
    {
        return $this->morphTo('fieldable');
    }
}
