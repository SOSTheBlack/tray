<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\MeliUser
 *
 * @property int $id
 * @property int $ref_id
 * @property string $nickname
 * @property string $access_token
 * @property string $refresh_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|MeliUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MeliUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MeliUser onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|MeliUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|MeliUser whereAccessToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MeliUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MeliUser whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MeliUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MeliUser whereNickname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MeliUser whereRefId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MeliUser whereRefreshToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MeliUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MeliUser withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|MeliUser withoutTrashed()
 * @mixin \Eloquent
 */
class MeliUser extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'ref_id',
        'nickname',
        'access_token',
        'refresh_token',
    ];
}
