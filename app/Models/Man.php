<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Man
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Man newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Man newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Man query()
 * @method static \Illuminate\Database\Eloquent\Builder|Man whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Man whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Man whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Man extends Model
{
    use HasFactory;
}
