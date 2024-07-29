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
            'first_name' => 'required|string|min:2|max:50',
            'last_name' => 'required|string|min:2|max:50',
            'gender' => 'required|in:M,F',
            'nin' => 'required|regex:/^(CF|CM)\d{12}$/',
            'date_of_birth' => 'required|date',
            'marital_status' => 'required|in:1,2,3,4',
            'phone_number' => 'required|string|min:10|max:10|regex:/^\d{10}$/',
            'next_of_kin' => 'required|string|min:2|max:50',
            'nok_phone_number' => 'required|string|min:10|max:10|regex:/^\d{10}$/',
            'relationship' => 'required|in:1,2,3,4,5',
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'Please enter your first name (2-50 characters).',
            'first_name.min' => 'First name must be at least 2 characters long.',
            'first_name.max' => 'First name must not exceed 50 characters.',
            'last_name.required' => 'Please enter your last name (2-50 characters).',
            'last_name.min' => 'Last name must be at least 2 characters long.',
            'last_name.max' => 'Last name must not exceed 50 characters.',
            'gender.required' => 'Please select your gender.',
            'gender.in' => 'Gender must be either M or F.',
            'nin.required' => 'Please enter your NIN (National Identification Number).',
            'nin.regex' => 'NIN must start with CF or CM followed by 12 digits.',
            'date_of_birth.required' => 'Please enter your date of birth.',
            'date_of_birth.date' => 'Date of birth must be a valid date.',
            'marital_status.required' => 'Please select your marital status.',
            'marital_status.in' => 'Marital status must be one of the following: 1 (single), 2 (married), 3 (divorced), or 4 (widowed).',
            'phone_number.required' => 'Please enter your phone number (10 digits).',
            'phone_number.min' => 'Phone number must be exactly 10 digits.',
            'phone_number.max' => 'Phone number must be exactly 10 digits.',
            'phone_number.regex' => 'Phone number must contain only digits.',
            'next_of_kin.required' => 'Please enter the name of your next of kin (2-50 characters).',
            'next_of_kin.min' => 'Next of kin name must be at least 2 characters long.',
            'next_of_kin.max' => 'Next of kin name must not exceed 50 characters.',
            'nok_phone_number.required' => 'Please enter your next of kin\'s phone number (10 digits).',
            'nok_phone_number.min' => 'Next of kin\'s phone number must be exactly 10 digits.',
            'nok_phone_number.max' => 'Next of kin\'s phone number must be exactly 10 digits.',
            'nok_phone_number.regex' => 'Next of kin\'s phone number must contain only digits.',
            'relationship.required' => 'Please specify your relationship with the next of kin.',
            'relationship.in' => 'Relationship must be one of the following: 1 (mother), 2 (father), 3 (daughter), 4 (son), or 5 (uncle).',
        ];
    }
}
