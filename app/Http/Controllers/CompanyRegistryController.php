<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Mail\SubmittedCompanyEmail;
use App\Models\CompanyRegistry;
use App\Service\CompanyService;
use App\Service\HistoryService;
use Illuminate\Support\Facades\Mail;


class CompanyRegistryController extends Controller
{

    /**
     * @var HistoryService
     */
    private HistoryService $historyService;
    /**
     * @var CompanyService
     */
    private CompanyService $companyService;

    public function __construct( HistoryService $historyService, CompanyService $companyService)
    {
        $this->historyService = $historyService;
        $this->companyService = $companyService;
    }

    public function create()
    {
        return view('companies.create');
    }


    public function request(CompanyRequest $request)
    {;
        $company = CompanyRegistry::make(
            [
                'symbol'  => $request['symbol'],
                'start_date' => $request['start_date'],
                'end_date' => $request['end_date'],
                'email' => $request['email'],
            ]);
        Mail::to($company->email)->send(new SubmittedCompanyEmail($company));

        $collection = collect(json_decode($this->historyService->getHistoricalQuotes($company->symbol))->prices);

        $history = $this->companyService->filterByDates($collection, $company);

        return view('companies.show', compact('history'));
    }

}
