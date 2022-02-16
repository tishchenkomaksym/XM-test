<?php

namespace App\Rules;

use App\Service\CompanyService;
use Illuminate\Contracts\Validation\Rule;

class ExistentCompanies implements Rule
{


    /**
     * Create a new rule instance.
     *
     * @param
     */
    public function __construct()
    {

    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $companyService = new CompanyService();
        return in_array($value, $companyService->getCompanySymbols(), true);

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The symbol in invalid';
    }
}
