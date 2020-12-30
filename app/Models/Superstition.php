<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Sign
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property string|null $description
 * @property int $month
 * @property int $day
 * @method static \Illuminate\Database\Eloquent\Builder|Superstition newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Superstition newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Superstition query()
 * @method static \Illuminate\Database\Eloquent\Builder|Superstition whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Superstition whereDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Superstition whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Superstition whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Superstition whereMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Superstition whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Superstition whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Superstition extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $fillable = [
        'day',
        'month',
        'name',
        'description',
        'full_text',
    ];


}
