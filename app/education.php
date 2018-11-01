<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class education extends Model
{
    public $table = 'educations';
    // primary key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = false;
    
    public function user(){

    	return $this->belongsTo('App\User');
    }
}
