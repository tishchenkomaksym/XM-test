<?php

namespace App\Mail;


use App\Models\CompanyRegistry;
use App\Service\CompanyService;
use Illuminate\Bus\Queueable;
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
     * @param $companyRegistry
     */
    public function __construct(CompanyRegistry $companyRegistry)
    {
        $this->companyRegistry = $companyRegistry;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $historyService = new CompanyService();
        $companyName = $historyService->getCompanyName($this->companyRegistry->symbol);

        return $this->from(config('mail.mailers.smtp.username'))
                    ->subject($companyName)
                    ->view('emails.submittedCompany');;

    }
}
