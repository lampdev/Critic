<?php

namespace App\Http\Controllers;

use App\PaymentOptions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class PaymentOptionsController extends Controller
{
    public function getPage()
    {
    	$paymentOptions = PaymentOptions::all();
        return view('manage.payment_options',[
            'section' => 'payment_options',
            'paymentOptions' => $paymentOptions
        ]);
    }
    public function addPaymentOption(Request $request)
    {
        // validate
        $paymentOptionValidator = Validator::make(
            array(
                'payment-option-name' => $request->input('payment-option-name'),
            ),
            array(
                'payment-option-name' => 'required|unique:payment_options,name|max:255',
            )
        );

        if ($paymentOptionValidator->fails())
        {
            // when validation is failed then return to  page back 
            return back()
                    ->withInput($request->input())
                    ->withErrors($paymentOptionValidator->messages())
                    ->with('type', 'add');
        }
        if ($paymentOptionValidator->passes()){ 
            // when it passed, add to DB
            PaymentOptions::addOne($request->input('payment-option-name'));
        }
        return redirect('manage/payment_options');
    }
}
