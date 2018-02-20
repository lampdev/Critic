<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentOptions extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'payment_options';
    public static function addOne($name)
    {
    	// add values to payment_options table
        $date = new \DateTime();
        $paymentOptionId = \DB::table('payment_options')->insertGetId([
            'name' => $name,
            'created_at' => $date->format('Y-m-d H:i:s'),
            'updated_at' => $date->format('Y-m-d H:i:s'),
            'active' => 0,
            'created_user_id' => \Auth::user()->id,
            'updated_user_id' => \Auth::user()->id
        ]);
    }
}
