<?php

namespace App\Observers;

use App\Models\Patient;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PatientObserver
{
    public function creating(Patient $patient): void
    {
        // Log the creation of a new patient
        if (empty($patient->first_name)) {
            $patient->first_name = 'Random name';
            $patient->last_name = 'Random name';
        
        }

        Log::info('A patient is being created: '.$patient->first_name);

        Log::info('A patient is created with ID: '.$patient->id);
    }
    /**
     * Handle the Patient "created" event.
     */
    public function created(Patient $patient): void
    {
        // Log the creation of a new patient
        Log::info('A patient is created with ID: '.$patient->id);
        $patient_name = $patient->first_name .''. $patient->last_name;
        $slug=Str::slug($patient_name,'-');
        $patient->slug=$slug;

        Log::info('name: '.$slug);
    
    }

    /**
     * Handle the Patient "updated" event.
     */
    public function updated(Patient $patient): void
    {
        // Log the update of a patient
        Log::info('Patient updated: ', $patient->toArray());


    }

    /**
     * Handle the Patient "deleted" event.
     */
    public function deleted(Patient $patient): void
    {
        // Log the deletion of a patient
        Log::info('Patient deleted: ', $patient->toArray());

    }

    /**
     * Handle the Patient "restored" event.
     */
    public function restored(Patient $patient): void
    {
        // Log the restoration of a patient
        Log::info('Patient restored: ', $patient->toArray());

    }

    /**
     * Handle the Patient "force deleted" event.
     */
    public function forceDeleted(Patient $patient): void
    {
        // Log the force deletion of a patient
        Log::info('Patient force deleted: ', $patient->toArray());

        // Add any other logic you need here
    }
}
