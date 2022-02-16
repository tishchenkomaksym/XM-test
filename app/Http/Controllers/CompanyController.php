<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Mail\SubmittedCompanyEmail;
use App\Models\CompanyRegistry;
use App\Service\CompanyService;
use Illuminate\Support\Facades\Mail;

class CompanyController extends Controller
{
    /**
     * @var CompanyService
     */
    private CompanyService $companyService;

    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }

    public function index()
    {
        $companyRegistry = CompanyRegistry::paginate(20);
        return view('companies.index', compact('companyRegistry'));
    }

    public function create()
    {
        return view('companies.create');
    }

    public function show(CompanyRegistry $company)
    {
        return view('companies.show', compact('company'));
    }

    public function store(CompanyRequest $request)
    {;
        $company = CompanyRegistry::create(
            [
                'symbol'  => $request['symbol'],
                'start_date' => $request['start_date'],
                'end_date' => $request['end_date'],
                'email' => $request['email'],
            ]
        );
        Mail::to($company->email)->send(new SubmittedCompanyEmail($company));
        return redirect()->route('companies.show', $company);
    }
}
