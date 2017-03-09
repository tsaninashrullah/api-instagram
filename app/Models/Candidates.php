<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidates extends Model
{
    protected $table = 'candidates';
    protected $fillable = [
    	'name',
    	'address',
    	'born',
    	'email',
    	'visi',
    	'misi',
    	'image',
    	'vote'
    ];

    public function votes(){
    return $this->hasMany('App\Models\Votes', 'candidates_id');
    }

    public function user() {
    return $this->belongsTo('App\Models\User', 'users_id');
    }

    public static function getVotes(){
        $votes = Candidates::all();
        return $votes;
    }

}
