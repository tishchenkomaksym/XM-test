<?php


namespace App\Service;


use App\Models\Company;
use HttpRequest;
use Illuminate\Support\Facades\Http;

class CompanyService
{
    public const LISTINGS_COMPANY_URL = 'https://pkgstore.datahub.io/core/nasdaq-listings/nasdaq-listed_json/data/a5bc7580d6176d60ac0b2142ca8d7df6/nasdaq-listed_json.json';

    public function getCompanySymbols()
    {
        $symbols = [];
        $response = Http::get(self::LISTINGS_COMPANY_URL);
        foreach (array_chunk(json_decode($response->body()), 1000) as $chunk) {
            foreach ($chunk as $companyData) {
                if (!in_array($companyData->Symbol, $symbols)) {
                    $symbols[] = $companyData->Symbol;
                }
            }
        }
        return $symbols;
    }

    public function saveCompanyData()
    {
        Company::truncate();
        $response = Http::get(self::LISTINGS_COMPANY_URL);
        foreach (array_chunk(json_decode($response->body(), true), 1000) as $chunk) {
            foreach ($chunk as $companyData) {
                Company::create([
                    'name' => $companyData['Company Name'],
                    'financial_status' => $companyData['Financial Status'],
                    'market_category' => $companyData['Market Category'],
                    'round_lot_size' => $companyData['Round Lot Size'],
                    'security_name' => $companyData['Security Name'],
                    'symbol' => $companyData['Symbol'],
                    'test_issue' => $companyData['Test Issue'],
                ]);
            }
        }

    }
}
