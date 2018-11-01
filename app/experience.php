<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class experience extends Model
{
    public $table = 'experiences';
    // primary key
    //public $primaryKey = 'id';
    // Timestamps
    public $timestamps = false;
    public function user(){

    	return $this->belongsTo('App\User');
    }
    
}
