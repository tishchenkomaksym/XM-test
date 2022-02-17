<?php


namespace App\Service;


use App\Models\History;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class HistoryService
{
    public function getHistoricalQuotes(string $symbol)
    {
        $response = Http::withHeaders([
            'x-rapidapi-host' => 'yh-finance.p.rapidapi.com',
            'x-rapidapi-key' => 'c05ca4ea87mshdebf0ec914e0fc7p1497d7jsnb506ba0e7525'
        ])->get('https://yh-finance.p.rapidapi.com/stock/v3/get-historical-data?symbol=' . $symbol);


        return $response->body();
    }


}
