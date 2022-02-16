<?php

namespace App\Mail;

use App\Models\Company;
use App\Models\CompanyRegistry;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SubmittedCompanyEmail extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * @var CompanyRegistry
     */
    public CompanyRegistry $companyRegistry;

    /**
     * Create a new message instance.
     *
     * @param $company
     */
    public function __construct(CompanyRegistry $company)
    {
        $this->companyRegistry = $company;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $company = Company::where('symbol', $this->companyRegistry->symbol)->first();
        $email = $this->from(config('mail.mailers.smtp.username'))
                      ->subject($company->name)
                      ->view('emails.submittedCompany');

        return $email;

    }
}
