<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createPaymentVisaRequest extends FormRequest
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
            'full_name' => 'required',
            'first_name' => 'required',
            'birthday' => 'required',
            'nationality' => 'required',
            'nationality_at_birth' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'passport_number' => 'required',
            'country_of_passport' => 'required',
            'passport_type' => 'required',
            'expiry_date' => 'required',
            'intended_date_of_entry' => 'required',
            'purpose_of_entry' => 'required',
            'city_province' => 'required',
            'address' => 'required',
            'grant_visa_valid_from' => 'required',
            'grant_visa_valid_to' => 'required'
        ];
    }
}
