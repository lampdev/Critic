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
                'row-id' => $request->input('row-id'),
                'payment-option-name' => $request->input('payment-option-name'),
            ),
            array(
            	'row-id' => 'required|min:0|numeric',
                'payment-option-name' => 'required|unique:payment_options,name|max:255',
            )
        );
		
		// when validation is failed then return to  page back 
        if ($paymentOptionValidator->fails())
        {
            return back()
                    ->withInput($request->input())
                    ->withErrors($paymentOptionValidator->messages());
        }

        // when it passed than Add/Edit
        if ($paymentOptionValidator->passes()) { 
            
            if ($request->input('row-id') == 0) {
            	PaymentOptions::add($request->input('payment-option-name'));
            } else {
                PaymentOptions::edit($request->input('row-id'), $request->input('payment-option-name'));
            }

        }
        return redirect('manage/payment_options');
    }
}
