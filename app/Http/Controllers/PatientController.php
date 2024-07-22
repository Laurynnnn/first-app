<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::all();
        return view('patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePatientRequest $request)
    {
        // DB::insert
        // dd($request->validated());
        Patient::create($request->all());
        // DB::insert('INSERT INTO patients (first_name,last_name,gender,nin, date_of_birth,marital_status,
        // phone_number,
        // next_of_kin,
        // nok_phone_number,
        // relationship) VALUES (?,?,?,?,?,?,?,?,?,?)', [$request->first_name,$request->last_name,$request->gender,$request->nin, $request->date_of_birth, $request->marital_status, $request->phone_number, $request->next_of_kin, $request->nok_phone_number, $request->relationship]);

        return redirect()->route('patients.index')
                         ->with('success', 'Patient created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $patient=Patient::findOrFail($id);
        // $patient = DB::select('SELECT * FROM patients WHERE id=:id', ['id'=> $id]);
        // dd($patient);
        return view('patients.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // dd($request);
        $patient=Patient::findOrFail($id);
        return view('patients.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patient $patient)
    {
        $patient->update($request->all());

        return redirect()->route('patients.index')
                         ->with('success', 'Patient updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();

        return redirect()->route('patients.index')
                         ->with('success', 'Patient deleted successfully.');
    }
}
