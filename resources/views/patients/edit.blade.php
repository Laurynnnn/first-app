@extends('layout')

@section('content')
    <h1>Edit Patient</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('patients.update', $patient->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="first_name">First Name:</label>
            <input type="text" class="form-control" name="first_name" id="first_name" value="{{ $patient->first_name }}">
        </div>
        <div class="form-group">
            <label for="last_name">Last Name:</label>
            <input type="text" class="form-control" name="last_name" id="last_name" value="{{ $patient->last_name }}">
        </div>
        <div class="form-group">
            <label for="gender">Gender:</label>
            <select class="form-control" name="gender" id="gender">
                <option value="M" {{ $patient->gender == 'M' ? 'selected' : '' }}>Male</option>
                <option value="F" {{ $patient->gender == 'F' ? 'selected' : '' }}>Female</option>
            </select>
        </div>
        <div class="form-group">
            <label for="nin">NIN:</label>
            <input type="text" class="form-control" name="nin" id="nin" maxlength="14" value="{{ $patient->nin }}">
        </div>
        <div class="form-group">
            <label for="date_of_birth">Date of Birth:</label>
            <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" value="{{ $patient->date_of_birth }}">
        </div>
        <div class="form-group">
            <label for="marital_status">Marital Status:</label>
            <select class="form-control" name="marital_status" id="marital_status">
                <option value="1" {{ $patient->marital_status == '1' ? 'selected' : '' }}>Single</option>
                <option value="2" {{ $patient->marital_status == '2' ? 'selected' : '' }}>Married</option>
                <option value="3" {{ $patient->marital_status == '3' ? 'selected' : '' }}>Divorced</option>
                <option value="4" {{ $patient->marital_status == '4' ? 'selected' : '' }}>Widowed</option>
            </select>
        </div>
        <div class="form-group">
            <label for="phone_number">Phone Number:</label>
            <input type="text" class="form-control" name="phone_number" id="phone_number" value="{{ $patient->phone_number }}">
        </div>
        <div class="form-group">
            <label for="next_of_kin">Next of Kin:</label>
            <input type="text" class="form-control" name="next_of_kin" id="next_of_kin" value="{{ $patient->next_of_kin }}">
        </div>
        <div class="form-group">
            <label for="nok_phone_number">NOK Phone Number:</label>
            <input type="text" class="form-control" name="nok_phone_number" id="nok_phone_number" value="{{ $patient->nok_phone_number }}">
        </div>
        <div class="form-group">
            <label for="relationship">Relationship:</label>
            <select class="form-control" name="relationship" id="relationship">
                <option value="1" {{ $patient->relationship == '1' ? 'selected' : '' }}>Mother</option>
                <option value="2" {{ $patient->relationship == '2' ? 'selected' : '' }}>Father</option>
                <option value="3" {{ $patient->relationship == '3' ? 'selected' : '' }}>Daughter</option>
                <option value="4" {{ $patient->relationship == '4' ? 'selected' : '' }}>Son</option>
                <option value="5" {{ $patient->relationship == '5' ? 'selected' : '' }}>Uncle</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Patient</button>
    </form>
@endsection
