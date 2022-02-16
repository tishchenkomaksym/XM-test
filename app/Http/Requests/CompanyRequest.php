<?php

namespace App\Http\Requests;

use App\Rules\CorrectEndDate;
use App\Rules\CorrectStartDate;
use App\Rules\ExistentCompanies;
use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'symbol' => [
                'required',
                 new ExistentCompanies()
                ],
            'start_date' => [
                'required',
                'date_format:Y-m-d',
                new CorrectStartDate($this->request->get('end_date'))
                ],
            'end_date' => [
                'required',
                'date_format:Y-m-d',
                new CorrectEndDate($this->request->get('start_date'))
            ],
            'email' =>
                [
                'required',
                'email:rfc'
            ]
        ];
    }
}
