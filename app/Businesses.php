<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Businesses extends Model
{
    //get all visible business info for admin
    public static function getAll()
    {
        return \DB::table('businesses')
            ->select('name', 'description', 'type', 'active')
            ->get()
            ->all();
    }
    // add one business
    public static function addOne($name, $type, $description, $wto, $wtoDescription, $pricing, $website, $glutenFree, $gfDescription)
    {
    	// add values to businesses table
        $date = new \DateTime();
        \DB::table('businesses')->insertGetId([
            'name' => $name,
            'type' => $type,
            'description' => $description,
            'what_to_order' => $wto,
            'what_to_order_description' => $wtoDescription,
            'created_at' => $date->format('Y-m-d H:i:s'),
            'updated_at' => $date->format('Y-m-d H:i:s'),
            'active' => 0,
            'created_user_id' => 1,
            'updated_user_id' => 1
        ]);
        // preparing for adding values to business_parameter_value
        $thisBusiness = \DB::select('id')
            ->from('businesses as b')
            ->where('b.name', '=', $name)
            ->where('b.created_at', '=', $date->format('Y-m-d H:i:s'))
            ->get();
        $parameter[1] = $pricing;
        $parameter[2] = $website;
        $parameter[3] = $glutenFree;
        $parameter[4] = $gfDescription;
        // adding values to business_parameter_value table
        for($i = 1; $i <= 4; $i++)
        {
            \DB::table('business_parameter_value')->insertGetId([
                'business_id' => $thisBusiness[0]->id,
                'parameter_id' => $i,
                'value' => $parameter[$i],
                'created_at' => $date->format('Y-m-d H:i:s'),
                'updated_at' => $date->format('Y-m-d H:i:s'),
                'active' => 1,
                'created_user_id' => 1,
                'updated_user_id' => 1
            ]);
        }
    }
}
