<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function neighborhoods()
    {
        return view('manage.neighborhoods',['section'=>'neighborhoods']);
    }
    public function businesses()
    {
        return view('manage.businesses',['section'=>'businesses']);
    }
    public function locations()
    {
        return view('manage.locations',['section'=>'locations']);
    }
    public function specialties()
    {
        return view('manage.specialties',['section'=>'specialties']);
    }
    public function payment_options()
    {
        return view('manage.payment_options',['section'=>'payment_options']);
    }

}
