<?php

namespace App\Rules;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class CorrectEndDate implements Rule
{
    /**
     * @var string
     */
    private string $startDate;

    /**
     * Create a new rule instance.
     *
     * @param string $startDate
     */
    public function __construct(string $startDate)
    {
        $this->startDate = $startDate;
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
        $endDate = new Carbon($value);
        $startDate = new Carbon($this->startDate);
        $now = new Carbon();

        if ($endDate >= $startDate && $endDate <= $now) {
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
        return 'The end Date is invalid.';
    }
}
