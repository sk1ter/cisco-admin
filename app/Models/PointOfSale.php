<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PointOfSale
 *
 * @property int $id
 * @property string $url
 * @property string $name
 * @property string $description
 * @property string $phone
 * @property string $address
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\PointOfSaleFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|PointOfSale newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PointOfSale newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PointOfSale query()
 * @method static \Illuminate\Database\Eloquent\Builder|PointOfSale whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointOfSale whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointOfSale whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointOfSale whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointOfSale whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointOfSale wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointOfSale whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointOfSale whereUrl($value)
 * @mixin \Eloquent
 */
class PointOfSale extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'name',
        'description',
        'phone',
        'address'
    ];
}
