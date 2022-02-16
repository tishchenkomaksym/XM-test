<?php

namespace App\Rules;

use Carbon\Carbon;
use DateTime;
use Illuminate\Contracts\Validation\Rule;

class CorrectStartDate implements Rule
{
    /**
     * @var string
     */
    private string $endDate;

    /**
     * Create a new rule instance.
     *
     * @param string $endDate
     */
    public function __construct(string $endDate)
    {
        $this->endDate = $endDate;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     *
     * @return bool
     * @throws \Exception
     */
    public function passes($attribute, $value)
    {
        $startDate = new Carbon($value);
        $endDate = new Carbon($this->endDate);
        $now = new Carbon();
        if ($startDate <= $endDate && $startDate <= $now) {
            return true;
        }

        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Start Date is invalid';
    }
}
