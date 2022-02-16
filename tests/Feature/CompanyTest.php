<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetCompanies()
    {
        $response = $this->get(route('companies.index'));

        $response->assertStatus(200);
    }

    public function testStoreCompanyRequest()
    {
        $data = [
            'symbol' => 'AAIT',
            'start_date' => Carbon::now()->format('Y-m-d'),
            'end_date' => Carbon::now()->addDays(2)->format('Y-m-d'),
            'email' => 'test@mail.ua'
        ];

        $this->post(route('companies.store'), $data);

        $this->assertDatabaseHas('company_registry', $data);
    }

    /**
     * @test
     * @dataProvider invalidCompanies
     */

    public function storeInvalidCompanyData($invalidData, $invaludFields)
    {

        $this->post(route('companies.store'), $invalidData)
             ->assertSessionHasErrors($invaludFields)
             ->assertStatus(302);

        $this->assertDatabaseCount('companies', 0);

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
                    'start_date' => Carbon::now()->format('Y-m-d'),
                    'end_date' => Carbon::now()->ceilHour()->format('Y-m-d'),
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
        ];
    }


}
