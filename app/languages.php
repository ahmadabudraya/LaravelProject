<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class languages extends Model
{
    public $table = 'languages';
    public $timestamps = false;

    public function user(){

    	return $this->belongsTo('App\User');
    }
}
