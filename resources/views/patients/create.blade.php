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

    <form action="{{ route('patients.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="first_name">First Name:</label>
            <input required type="text" class="form-control" name="first_name" id="first_name" value="{{ old('first_name') }}">
        </div>
        <div class="form-group">
            <label for="last_name">Last Name:</label>
            <input required type="text" class="form-control" name="last_name" id="last_name" value="{{ old('last_name') }}">
        </div>
        <div class="form-group">
            <label for="gender">Gender:</label>
            <select class="form-control" name="gender" id="gender" required>
                <option value="M" {{ old('gender') == 'M' ? 'selected' : '' }}>Male</option>
                <option value="F" {{ old('gender') == 'F' ? 'selected' : '' }}>Female</option>
            </select>
        </div>
        <div class="form-group">
            <label for="nin">NIN:</label>
            <input required type="text" class="form-control" name="nin" id="nin" maxlength="14" value="{{ old('nin') }}">
        </div>
        <div class="form-group">
            <label for="date_of_birth">Date of Birth:</label>
            <input required type="date" class="form-control" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth') }}">
        </div>
        <div class="form-group">
            <label for="marital_status">Marital Status:</label>
            <select class="form-control" name="marital_status" id="marital_status" required>
                <option value="1" {{ old('marital_status') == '1' ? 'selected' : '' }}>Single</option>
                <option value="2" {{ old('marital_status') == '2' ? 'selected' : '' }}>Married</option>
                <option value="3" {{ old('marital_status') == '3' ? 'selected' : '' }}>Divorced</option>
                <option value="4" {{ old('marital_status') == '4' ? 'selected' : '' }}>Widowed</option>
            </select>
        </div>
        <div class="form-group">
            <label for="phone_number">Phone Number:</label>
            <input required maxlength="10" minlength="10" type="text" class="form-control" name="phone_number" id="phone_number" value="{{ old('phone_number') }}">
        </div>
        <div class="form-group">
            <label for="next_of_kin">Next of Kin:</label>
            <input required type="text" class="form-control" name="next_of_kin" id="next_of_kin" value="{{ old('next_of_kin') }}">
        </div>
        <div class="form-group">
            <label for="nok_phone_number">NOK Phone Number:</label>
            <input required maxlength="10" minlength="10" type="text" class="form-control" name="nok_phone_number" id="nok_phone_number" value="{{ old('nok_phone_number') }}">
        </div>
        <div class="form-group">
            <label for="relationship">Relationship:</label>
            <select class="form-control" name="relationship" id="relationship" required>
                <option value="1" {{ old('relationship') == '1' ? 'selected' : '' }}>Mother</option>
                <option value="2" {{ old('relationship') == '2' ? 'selected' : '' }}>Father</option>
                <option value="3" {{ old('relationship') == '3' ? 'selected' : '' }}>Daughter</option>
                <option value="4" {{ old('relationship') == '4' ? 'selected' : '' }}>Son</option>
                <option value="5" {{ old('relationship') == '5' ? 'selected' : '' }}>Uncle</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create Patient</button>
    </form>
</div>
@endsection