@extends('layout')

@section('content')
    <div class="container mt-5">
        <h1>Patient: {{ $patient->first_name }} {{ $patient->last_name }}</h1>
        <p><strong>Gender:</strong> {{ $patient->gender == 'M' ? 'Male' : 'Female' }}</p>
        <p><strong>NIN:</strong> {{ $patient->nin }}</p>
        <p><strong>Date of Birth:</strong> {{ $patient->date_of_birth }}</p>
        <p><strong>Marital Status:</strong>
            @switch($patient->marital_status)
                @case(1)
                    Single
                    @break
                @case(2)
                    Married
                    @break
                @case(3)
                    Divorced
                    @break
                @case(4)
                    Widowed
                    @break
            @endswitch
        </p>
        <p><strong>Phone Number:</strong> {{ $patient->phone_number }}</p>
        <p><strong>Next of Kin:</strong> {{ $patient->next_of_kin }}</p>
        <p><strong>NOK Phone Number:</strong> {{ $patient->nok_phone_number }}</p>
        <p><strong>Relationship:</strong>
            @switch($patient->relationship)
                @case(1)
                    Mother
                    @break
                @case(2)
                    Father
                    @break
                @case(3)
                    Daughter
                    @break
                @case(4)
                    Son
                    @break
                @case(5)
                    Uncle
                    @break
            @endswitch
        </p>
        <a href="{{ route('patients.index') }}" class="btn btn-secondary">Back to Patients</a>
    </div>
@endsection
