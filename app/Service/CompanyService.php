<?php


namespace App\Service;


use App\Models\Company;
use Carbon\Carbon;
use HttpRequest;
use Illuminate\Support\Collection;
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

    public function getCompanyName(string $symbol)
    {
        $name = '';
        $response = Http::get(self::LISTINGS_COMPANY_URL);
        foreach (array_chunk(json_decode($response->body(), true), 1000) as $chunk) {
            foreach ($chunk as $companyData) {
                if ($symbol === $companyData['Symbol']) {
                    $name = $companyData['Company Name'];
                }
            }
        }
        return $name;
    }

    /**
     * @param $collection
     * @param $company
     *
     * @return mixed
     */
    public function filterByDates(Collection $collection, $company)
    {
        return $collection->filter(function($model) use($company) {
            $date = Carbon::createFromTimestamp($model->date);
            $start_date = new Carbon($company->start_date);
            $end_date = new Carbon($company->end_date);
            if ($date >= $start_date && $date <= $end_date) {
                return true;
            }
        });
    }
}
