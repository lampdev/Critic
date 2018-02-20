<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LocationController extends Controller
{
    public function getPage()
    {
        return view('manage.locations',[
            'section' => 'locations'
        ]);
    }
}
