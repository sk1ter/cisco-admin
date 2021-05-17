<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Carbon;
use JetBrains\PhpStorm\Pure;

/**
 * App\Models\Product
 *
 * @method static Builder|Product newModelQuery()
 * @method static Builder|Product newQuery()
 * @method static Builder|Product query()
 * @mixin Eloquent
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $particular_qualities
 * @property string $characteristics
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Product whereCharacteristics($value)
 * @method static Builder|Product whereCreatedAt($value)
 * @method static Builder|Product whereDescription($value)
 * @method static Builder|Product whereId($value)
 * @method static Builder|Product whereName($value)
 * @method static Builder|Product whereParticularQualities($value)
 * @method static Builder|Product whereUpdatedAt($value)
 * @property string $image_url
 * @property-read Collection|Field[] $fields
 * @property-read int|null $fields_count
 * @method static Builder|Product whereImageUrl($value)
 * @method static \Database\Factories\ProductFactory factory(...$parameters)
 */
class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'particular_qualities',
        'characteristics',
        'image_url'
    ];

    /**
     * @return MorphMany|Field[]
     */
    public function fields(): MorphMany
    {
        return $this->morphMany(Field::class, 'fieldable');
    }

    #[Pure]
    public function trimDescription(int $length): string
    {
        return \Str::limit($this->description, $length);
    }
}
