<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
    protected $table = 'histories';

    protected $fillable = [
        'date',
        'open',
        'high',
        'low',
        'volume',
        'close',
        'adjclose',
    ];

    protected array $casts = [
        'date' => 'datetime:Y-m-d',
    ];
}
