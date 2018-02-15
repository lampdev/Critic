<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Neighborhoods extends Model
{
    public static function GetAll()
    {
    	return \DB::select('SELECT n.name, n.city, n.state, n.active  FROM neighborhoods n WHERE ?', [1]);
    }
}
