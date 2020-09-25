<?php

namespace App\Models;

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
 * @method static \Illuminate\Database\Eloquent\Builder|Sign newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sign newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sign query()
 * @method static \Illuminate\Database\Eloquent\Builder|Sign whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sign whereDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sign whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sign whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sign whereMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sign whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sign whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Sign extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];


}
