<?php

namespace App\Http\Controllers;
use App\Neighborhoods;
use App\Businesses;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function neighborhoods()
    {
        $neighborhoods = Neighborhoods::getAll();
        return view('manage.neighborhoods',[
            'section'=>'neighborhoods',
            'neighborhoods'=>$neighborhoods
        ]);
    }
    public function businesses()
    {
        $businesses = Businesses::getAll();
        return view('manage.businesses',[
            'section' => 'businesses',
            'businesses' => $businesses
        ]);
    }
    public function addBusiness()
    {
        // get form request
        $businessRequest = &$_POST;
        // validate
        $businessValidator = Validator::make(
            array(
                'business-name' => $businessRequest['business-name'],
                'business-type' => $businessRequest['business-type'],
                'business-description' => $businessRequest['business-description'],
                'business-wto' => $businessRequest['business-wto'],
                'business-wto-description' => $businessRequest['business-wto-description'],
                'business-pricing' => $businessRequest['business-pricing'],
                'business-website' => $businessRequest['business-website'],
                'business-gluten-free' => $businessRequest['business-gluten-free'],
                'business-gf-description' => $businessRequest['business-gf-description'],
            ),
            array(
                'business-name' => 'required|unique:businesses,name|max:255',
                'business-type' => 'required',
                'business-description' => 'required',
                'business-wto' => 'required|max:255',
                'business-wto-description' => 'required',
                'business-pricing' => 'required|min:1|max:4',
                'business-website' => 'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/|unique:business_parameter_value,value',
                'business-gluten-free' => 'in:on,off',
                'business-gf-description' => '',
            )
        );
        
        if ($businessValidator->fails())
        {
            //echo "Validation error\n";
            //$messages = $businessValidator->messages();
            ///$failed = $businessValidator->failed();
            //dd($messages, $failed);
            return back()
                    ->withInput($businessRequest)
                    ->withErrors($businessValidator->messages());
        }
        if ($businessValidator->passes()){ 
            Businesses::addOne(
                $businessRequest['business-name'],
                $businessRequest['business-type'],
                $businessRequest['business-description'],
                $businessRequest['business-wto'],
                $businessRequest['business-wto-description'],
                $businessRequest['business-pricing'],
                $businessRequest['business-website'],
                $businessRequest['business-gluten-free'],
                $businessRequest['business-gf-description']
            );
        }
        return redirect('manage/businesses');
    }
    public function locations()
    {
        return view('manage.locations',[
            'section' => 'locations'
        ]);
    }
    public function specialties()
    {
        return view('manage.specialties',[
            'section' => 'specialties'
        ]);
    }
    public function paymentOptions()
    {
        return view('manage.payment_options',[
            'section' => 'payment_options'
        ]);
    }

}
