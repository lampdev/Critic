<?php

namespace App\Http\Controllers;

use App\Businesses;
use App\Parameters;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BusinessController extends Controller
{
    public function getPage()
    {
        $businesses = Businesses::all();
        return view('manage.businesses',[
            'section' => 'businesses',
            'businesses' => $businesses
        ]);
    }
    public static function createParametersArray($request){
        $DBParameters = Parameters::select('id', 'name')->get()->toArray();
        foreach($DBParameters as $id => $row)
        foreach($request as $name => $value)
        {
            if ($row['name'] == $name) 
                $arr[$row['id']] = $value;
        }
        return $arr;
    }
    public function addBusiness(Request $request)
    {
        // validate
        $businessValidator = Validator::make(
            array(
                'row-id' => $request->input('row-id'),
                'business-name' => $request->input('business-name'),
                'business-type' => $request->input('business-type'),
                'business-description' => $request->input('business-description'),
                'business-wto' => $request->input('business-wto'),
                'business-wto-description' => $request->input('business-wto-description'),
                'business-pricing' => $request->input('business-pricing'),
                'business-website' => $request->input('business-website'),
                'business-gluten-free' => $request->input('business-gluten-free'),
                'business-gf-description' => $request->input('business-gf-description'),
            ),
            array(
                'row-id' => 'required|min:0|numeric',
                'business-name' => 'required|unique:businesses,name|max:255',
                'business-type' => 'required',
                'business-description' => 'required',
                'business-wto' => 'required|max:255',
                'business-wto-description' => 'required',
                'business-pricing' => 'required|min:1|max:4',
                'business-website' => 'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/|unique:business_parameter_value,value',
                'business-gluten-free' => 'in:on,off',
                'business-gf-description' => 'required',
            )
        );

        if ($businessValidator->fails())
        {
            // when validation is failed then return to  page back 
            return back()
                ->withInput($request->input())
                ->withErrors($businessValidator->messages())
                ->with('type', 'add');
        }
        if ($businessValidator->passes()){ 
            //create parameters array
            $businessParameters = $this->createParametersArray($request->input());
            // when it passed, add/edit 
            if ($request->input('row-id') == 0) {
                Businesses::addOne(
                    $request->input('business-name'),
                    $request->input('business-type'),
                    $request->input('business-description'),
                    $request->input('business-wto'),
                    $request->input('business-wto-description'),
                    $businessParameters
                );
            } else {
                Businesses::edit(
                    $request->input('row-id'),
                    $request->input('business-name'),
                    $request->input('business-type'),
                    $request->input('business-description'),
                    $request->input('business-wto'),
                    $request->input('business-wto-description'),
                    $businessParameters
                );
            }
            
        }
        return redirect('manage/businesses');
    }
}
