<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialties extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'specialties';
    public static function addOne($name)
    {
    	// add values to specialties table
        $date = new \DateTime();
        $specialtyId = \DB::table('specialties')->insertGetId([
            'name' => $name,
            'created_at' => $date->format('Y-m-d H:i:s'),
            'updated_at' => $date->format('Y-m-d H:i:s'),
            'active' => 0,
            'created_user_id' => \Auth::user()->id,
            'updated_user_id' => \Auth::user()->id
        ]);
    }
}
