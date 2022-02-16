<?php

namespace App\Console\Commands;

use App\Service\CompanyService;
use Illuminate\Console\Command;

class SaveCompaniesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'company:save';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Save company data';
    /**
     * @var CompanyService
     */
    private CompanyService $companyService;

    /**
     * Create a new command instance.
     *
     * @param CompanyService $companyService
     */
    public function __construct(CompanyService $companyService)
    {
        parent::__construct();
        $this->companyService = $companyService;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->companyService->saveCompanyData();
    }
}
