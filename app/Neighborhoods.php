<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Neighborhoods extends Model
{
    public static function getAll()
    {
    	return \DB::table('neighborhoods')
            ->select('name', 'city', 'state', 'active')
            ->get();
    }
}
