@extends('layout')

@section('content')
<div class="mt-5">
    <h1>Create Patient</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form id="patientForm" action="{{ route('patients.store') }}" method="POST" novalidate>
        @csrf
        <div class="form-group">
            <label for="first_name">First Name:</label>
            <input type="text" class="form-control" name="first_name" id="first_name" value="{{ old('first_name') }}" required minlength="2" maxlength="50">
            <div class="invalid-feedback">Please enter your first name (2-50 characters).</div>
        </div>
        <div class="form-group">
            <label for="last_name">Last Name:</label>
            <input type="text" class="form-control" name="last_name" id="last_name" value="{{ old('last_name') }}" required minlength="2" maxlength="50">
            <div class="invalid-feedback">Please enter your last name (2-50 characters).</div>
        </div>
        <div class="form-group">
            <label for="gender">Gender:</label>
            <select class="form-control" name="gender" id="gender" required>
                <option value="" disabled {{ old('gender') ? '' : 'selected' }}>Select gender</option>
                <option value="M" {{ old('gender') == 'M' ? 'selected' : '' }}>Male</option>
                <option value="F" {{ old('gender') == 'F' ? 'selected' : '' }}>Female</option>
            </select>
            <div class="invalid-feedback">Please select your gender.</div>
        </div>
        <div class="form-group">
            <label for="nin">NIN:</label>
            <input type="text" class="form-control" name="nin" id="nin" maxlength="14" pattern="^(CF|CM)\d{12}$" value="{{ old('nin') }}" required>
            <div class="invalid-feedback">Please enter a valid NIN (CF or CM followed by 10 digits).</div>
        </div>
        <div class="form-group">
            <label for="date_of_birth">Date of Birth:</label>
            <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth') }}" required>
            <div class="invalid-feedback">Please enter your date of birth.</div>
        </div>
        <div class="form-group">
            <label for="marital_status">Marital Status:</label>
            <select class="form-control" name="marital_status" id="marital_status" required>
                <option value="" disabled {{ old('marital_status') ? '' : 'selected' }}>Select marital status</option>
                <option value="1" {{ old('marital_status') == '1' ? 'selected' : '' }}>Single</option>
                <option value="2" {{ old('marital_status') == '2' ? 'selected' : '' }}>Married</option>
                <option value="3" {{ old('marital_status') == '3' ? 'selected' : '' }}>Divorced</option>
                <option value="4" {{ old('marital_status') == '4' ? 'selected' : '' }}>Widowed</option>
            </select>
            <div class="invalid-feedback">Please select your marital status.</div>
        </div>
        <div class="form-group">
            <label for="phone_number">Phone Number:</label>
            <input type="text" class="form-control" name="phone_number" id="phone_number" maxlength="10" minlength="10" pattern="^\d{10}$" value="{{ old('phone_number') }}" required>
            <div class="invalid-feedback">Please enter a valid phone number (10 digits).</div>
        </div>
        <div class="form-group">
            <label for="next_of_kin">Next of Kin:</label>
            <input type="text" class="form-control" name="next_of_kin" id="next_of_kin" minlength="2" maxlength="50" value="{{ old('next_of_kin') }}" required>
            <div class="invalid-feedback">Please enter the name of your next of kin (2-50 characters).</div>
        </div>
        <div class="form-group">
            <label for="nok_phone_number">NOK Phone Number:</label>
            <input type="text" class="form-control" name="nok_phone_number" id="nok_phone_number" maxlength="10" minlength="10" pattern="\d{10}" value="{{ old('nok_phone_number') }}" required>
            <div class="invalid-feedback">Please enter a valid NOK phone number (10 digits).</div>
        </div>
        <div class="form-group">
            <label for="relationship">Relationship:</label>
            <select class="form-control" name="relationship" id="relationship" required>
                <option value="" disabled {{ old('relationship') ? '' : 'selected' }}>Select relationship</option>
                <option value="1" {{ old('relationship') == '1' ? 'selected' : '' }}>Mother</option>
                <option value="2" {{ old('relationship') == '2' ? 'selected' : '' }}>Father</option>
                <option value="3" {{ old('relationship') == '3' ? 'selected' : '' }}>Daughter</option>
                <option value="4" {{ old('relationship') == '4' ? 'selected' : '' }}>Son</option>
                <option value="5" {{ old('relationship') == '5' ? 'selected' : '' }}>Uncle</option>
            </select>
            <div class="invalid-feedback">Please select your relationship with the next of kin.</div>
        </div>
        <button type="submit" class="btn btn-primary">Create Patient</button>
    </form>
</div>

<script>
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            var form = document.getElementById('patientForm');
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        }, false);
    })();
</script>
@endsection
