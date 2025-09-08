<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

class ImportController extends Controller
{
    //
    public function create(Request $request){

        $data = $request->all();

        $pdf = PDF::loadView('import.create', $data);
        return view('import.create');
    }
}
