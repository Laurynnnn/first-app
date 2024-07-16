@extends('layout')

@section('content')
    <div class="container mt-5">
        <h1>Patients</h1>
        <a class="btn btn-primary mb-3" href="{{ route('patients.create') }}">Create New Patient</a>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>NIN</th>
                    <th>Date of Birth</th>
                    <th>Marital Status</th>
                    <th>Phone Number</th>
                    <th>Next of Kin</th>
                    <th>NOK Phone Number</th>
                    <th>Relationship</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($patients as $patient)
                    <tr>
                        <td>{{ $patient->first_name }}</td>
                        <td>{{ $patient->last_name }}</td>
                        <td>{{ $patient->gender }}</td>
                        <td>{{ $patient->nin }}</td>
                        <td>{{ $patient->date_of_birth }}</td>
                        <td>{{ $patient->marital_status }}</td>
                        <td>{{ $patient->phone_number }}</td>
                        <td>{{ $patient->next_of_kin }}</td>
                        <td>{{ $patient->nok_phone_number }}</td>
                        <td>{{ $patient->relationship }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('patients.show', $patient->id) }}" class="btn btn-info btn-sm">Show</a>
                                <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this patient?')">Delete</button>
                                </form>
                            </div>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
