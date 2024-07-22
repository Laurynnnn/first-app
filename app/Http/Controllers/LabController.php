<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lab;

class LabController extends Controller
{
    public function index(){
        $labs = Lab::orderBy("created_at","desc")->paginate(10);
        dd($labs);

    }
}
