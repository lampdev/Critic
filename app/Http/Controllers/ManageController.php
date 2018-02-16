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
            'section'=>'businesses',
            'businesses'=>$businesses
        ]);
    }
    public function addBusiness()
    {
        $businessValidator = Validator::make(
            array(
                'business-name' => $_POST['business-name'],
                'business-type' => $_POST['business-type'],
                'business-description' => $_POST['business-description'],
                'business-wto' => $_POST['business-wto'],
                'business-wto-description' => $_POST['business-wto-description'],
                'business-pricing' => $_POST['business-pricing'],
                'business-website' => $_POST['business-website'],
                'business-gluten-free' => $_POST['business-gluten-free'],
                'business-gf-description' => $_POST['business-gf-description'],
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
                'business-gf-description' => 'required',
            )
        );
        if ($businessValidator->fails())
        {
            echo "Validation error\n";
            $messages = $businessValidator->messages();
            $failed = $businessValidator->failed();
            dd($messages, $failed);
        }
        if ($businessValidator->passes()){ 
            Businesses::addOne(
                $_POST['business-name'],
                $_POST['business-type'],
                $_POST['business-description'],
                $_POST['business-wto'],
                $_POST['business-wto-description'],
                $_POST['business-pricing'],
                $_POST['business-website'],
                $_POST['business-gluten-free'],
                $_POST['business-gf-description']
            );
        }
        return $this->businesses();
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
