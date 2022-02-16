<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';


    protected $fillable = [
        'name',
        'financial_status',
        'market_category',
        'round_lot_size',
        'security_name',
        'symbol',
        'test_issue'
    ];


}
