<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use SOSTheBlack\Repository\Contracts\Transformable;
use SOSTheBlack\Repository\Traits\TransformableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\MeliItem
 *
 * @property int $id
 * @property string $item_id
 * @property string $title
 * @property string $status
 * @property int|null $visits
 * @property \Illuminate\Support\Carbon $updated
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Database\Factories\MeliItemFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|MeliItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MeliItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MeliItem onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|MeliItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|MeliItem whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MeliItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MeliItem whereItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MeliItem whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MeliItem whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MeliItem whereUpdated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MeliItem whereVisits($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MeliItem withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|MeliItem withoutTrashed()
 * @mixin \Eloquent
 */
class MeliItem extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The name of the "created at" column.
     *
     * @var string|null
     */
    const CREATED_AT = 'updated';

    /**
     * The name of the "updated at" column.
     *
     * @var string|null
     */
    const UPDATED_AT = 'updated';

    protected $fillable = [
        'item_id',
        'title'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'updated' => 'datetime:Y-m-d',
    ];
}
