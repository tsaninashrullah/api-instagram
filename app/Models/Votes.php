<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Votes extends Model
{
	protected $table = 'votes';
    protected $fillable = [
    	'users_id',
    	'candidiates_id'
    ];
    
    public function candidates() {

  	return $this->belongsTo('App\Models\Candidates', 'candidates_id');
	}
     
    public function user() {

	return $this->belongsTo('App\Models\Users', 'users_id');
	}

}
