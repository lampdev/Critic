<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Businesses extends Model
{
    //connect to table
    protected $table = 'businesses';
    // add one business in Modal Window
    public static function addOne($name, $type, $description, $wto, $wtoDescription, $pricing, $website, $glutenFree, $gfDescription)
    {
    	// add values to businesses table
        $date = new \DateTime();
        $businessId = \DB::table('businesses')->insertGetId([
            'name' => $name,
            'type' => $type,
            'description' => $description,
            'what_to_order' => $wto,
            'what_to_order_description' => $wtoDescription,
            'created_at' => $date->format('Y-m-d H:i:s'),
            'updated_at' => $date->format('Y-m-d H:i:s'),
            'active' => 0,
            'created_user_id' => \Auth::user()->id,
            'updated_user_id' => \Auth::user()->id
        ]);
        // add values for business_parameter_value table
        foreach ([$pricing, $website, $glutenFree, $gfDescription] as $id_from_zero => $parameter) 
        {
            $parameter_id = $id_from_zero + 1;
            \DB::table('business_parameter_value')->insertGetId([
                'business_id' => $businessId,
                'parameter_id' => $parameter_id,
                'value' => $parameter,
                'created_at' => $date->format('Y-m-d H:i:s'),
                'updated_at' => $date->format('Y-m-d H:i:s'),
                'active' => 1,
                'created_user_id' => \Auth::user()->id,
                'updated_user_id' => \Auth::user()->id
            ]);
        }
    }
    public static function edit($id, $name, $type, $description, $wto, $wtoDescription, $pricing, $website, $glutenFree, $gfDescription)
    {
        // edit for businesses table
        $date = new \DateTime();
        $businessId = \DB::table('businesses')
        ->where('id', '=', $id)
        ->update([
            'name' => $name,
            'type' => $type,
            'description' => $description,
            'what_to_order' => $wto,
            'what_to_order_description' => $wtoDescription,
            'updated_at' => $date->format('Y-m-d H:i:s'),
            'active' => 0,
            'updated_user_id' => \Auth::user()->id
        ]);
        // edit values for business_parameter_value table
        foreach ([$pricing, $website, $glutenFree, $gfDescription] as $id_from_zero => $parameter) 
        {
            $parameter_id = $id_from_zero + 1;
            $businessId = \DB::table('business_parameter_value')
                ->where('id', '=', $id)
                ->update([
                    'business_id' => $businessId,
                    'parameter_id' => $parameter_id,
                    'value' => $parameter,
                    'updated_at' => $date->format('Y-m-d H:i:s'),
                    'active' => 1,
                    'updated_user_id' => \Auth::user()->id
                ]);
        }
    }
}
