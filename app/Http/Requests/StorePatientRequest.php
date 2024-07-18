<?php

namespace App\Http\Requests; 

use Illuminate\Foundation\Http\FormRequest;

class StorePatientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    { 
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'nullable',
            'last_name'=> 'nullable',
            'gender' => 'required',
            'nin' => 'required',
            'date_of_birth' => 'required',
            'marital_status' => 'required',
            'phone_number' => 'required',
            'next_of_kin' => 'required',
            'nok_phone_number' => 'required',
            'relationship' => 'required', 
        ]; 
    }
    public function messages():array{
        return [
            // 'first_name.required' => 'Please enter your first name.',
            // 'last_name.required' => 'Please enter your last name.',
            'gender.required' => 'Please select your gender.',
            'nin.required' => 'Please enter your NIN (National Identification Number).',
            'date_of_birth.required' => 'Please enter your date of birth.',
            'marital_status.required' => 'Please select your marital status.',
            'phone_number.required' => 'Please enter your phone number.',
            'next_of_kin.required' => 'Please enter your next of kin.',
            'nok_phone_number.required' => 'Please enter your next of kin\'s phone number.',
            'relationship.required' => 'Please specify your relationship with the next of kin.',
        ];
    }
}
