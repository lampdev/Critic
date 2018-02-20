<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Neighborhoods extends Model
{	
	//get all visible Neighborhoods info for DataTables
	
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'neighborhoods';
}
