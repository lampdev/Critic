<?php

namespace App\Http\Controllers;

use App\Specialties;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class SpecialtyController extends Controller
{
    public function getPage()
    {
    	$specialties = Specialties::all();
        return view('manage.specialties',[
            'section' => 'specialties',
            'specialties' => $specialties
        ]);
    }
    public function addSpecialty(Request $request)
    {
        // validate
        $specialtyValidator = Validator::make(
            array(
                'specialty-name' => $request->input('specialty-name'),
            ),
            array(
                'specialty-name' => 'required|unique:specialties,name|max:255',
            )
        );

        if ($specialtyValidator->fails())
        {
            // when validation is failed then return to  page back 
            return back()
                    ->withInput($request->input())
                    ->withErrors($specialtyValidator->messages());
        }
        if ($specialtyValidator->passes()){ 
            // when it passed, add to DB
            Specialties::addOne($request->input('specialty-name'));
        }
        return redirect('manage/specialties');
    }
}
