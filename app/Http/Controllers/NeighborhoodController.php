<?php

namespace App\Http\Controllers;

use App\Neighborhoods;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NeighborhoodController extends Controller
{
    public function getPage()
    {
        $neighborhoods = Neighborhoods::all();
        return view('manage.neighborhoods',[
            'section' => 'neighborhoods',
            'neighborhoods' => $neighborhoods
        ]);
    }
}
