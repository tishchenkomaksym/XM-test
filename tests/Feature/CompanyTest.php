<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Tests\TestCase;

class CompanyTest extends TestCase
{

    public function testRequestCompanyRequest()
    {
        $data = [
            'symbol' => 'AAIT',
            'start_date' => Carbon::now()->format('Y-m-d'),
            'end_date' => Carbon::now()->format('Y-m-d'),
            'email' => 'test@mail.ua'
        ];

        $this->post(route('companies.show'), $data)
           ->assertStatus(200);

    }

    /**
     * @test
     * @dataProvider invalidCompanies
     */

    public function storeInvalidCompanyData($invalidData, $invaludFields)
    {

        $this->post(route('companies.show'), $invalidData)
             ->assertSessionHasErrors($invaludFields)
             ->assertStatus(302);


    }

    public function invalidCompanies()
    {
        return [
            [
                [
                    'symbol' => 'AAITwww',
                    'start_date' => Carbon::now()->format('Y-m-d'),
                    'end_date' => Carbon::now()->addDays(2)->format('Y-m-d'),
                    'email' => 'test@mail.ua'
                ],
                ['symbol']
            ],
            [
                [
                    'symbol' => 'AAIT',
                    'start_date' => Carbon::now()->addDays(3)->format('Y-m-d'),
                    'end_date' => Carbon::now()->addDays(2)->format('Y-m-d'),
                    'email' => 'test@mail.ua'
                ],
                ['start_date']
            ],
            [
                [
                    'symbol' => 'AAIT',
                    'start_date' => Carbon::now()->format('Y/m/d'),
                    'end_date' => Carbon::now()->format('Y/m/d'),
                    'email' => 'test@mail.ua'
                ],
                ['start_date']
            ],
            [
                [
                    'symbol' => 'AAIT',
                    'start_date' => Carbon::now()->format('Y-m-d'),
                    'end_date' => Carbon::now()->ceilDays(3)->format('Y-m-d'),
                    'email' => 'test@mail.ua'
                ],
                ['end_date']
            ],
            [
                [
                    'symbol' => 'AAIT',
                    'start_date' => Carbon::now()->format('Y-m-d'),
                    'end_date' => Carbon::now()->format('Y/m/d'),
                    'email' => 'test@mail.ua'
                ],
                ['end_date']
            ],
            [
                [
                    'symbol' => 'AAIT',
                    'start_date' => Carbon::now()->format('Y-m-d'),
                    'end_date' => Carbon::now()->addDays(2)->format('Y-m-d'),
                    'email' => ''
                ],
                ['email']
            ],
            [
                [
                    'symbol' => 'AAIT',
                    'start_date' => Carbon::now()->format('Y-m-d'),
                    'end_date' => Carbon::now()->addDays(2)->format('Y-m-d'),
                ],
                ['email']
            ],
        ];
    }


}
