<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Company
 *
 * @property int $id
 * @property string $symbol
 * @property \datetime $start_date
 * @property \datetime $end_date
 * @property string $email
 * @method static \Database\Factories\CompanyFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyRegistry newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyRegistry newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyRegistry query()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyRegistry whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyRegistry whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyRegistry whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyRegistry whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyRegistry whereSymbol($value)
 * @mixin \Eloquent
 */
class CompanyRegistry extends Model
{
    use HasFactory;

    protected $table = 'company_registry';
    public $timestamps = false;

    protected $fillable = [
        'symbol',
        'start_date',
        'end_date',
        'email'
    ];

    protected array $casts = [
        'start_date'        => 'datetime:Y-m-d',
        'end_date' => 'datetime:Y-m-d'
    ];
}
