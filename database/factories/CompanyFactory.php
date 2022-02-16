<?php

namespace Database\Factories;

use App\Models\CompanyRegistry;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    protected $model = CompanyRegistry::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'symbol' => 'AAIT',
            'start_date' => Carbon::now()->format('y-m-d'),
            'end_date' => Carbon::now()->addDays(2),
            'email' => 'test@mail.ua'
        ];
    }
}
