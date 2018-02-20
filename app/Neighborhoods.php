<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Neighborhoods extends Model
{	
	//get all visible Neighborhoods info for DataTables
    public static function getAll()
    {
        return \DB::table('neighborhoods')
        ->select('name', 'city', 'state', 'active')
        ->get();
    }
}
