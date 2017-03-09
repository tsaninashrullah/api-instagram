<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Cartalyst\Sentinel\Users\UserInterface;
use Cartalyst\Sentinel\Users\EloquentUser as SentinelUser;

class Users extends SentinelUser
{
    protected $loginNames = ['nisn'];
    protected $table = 'users';
    protected $fillable = [
    	'name',
    	'born',
        'address',
    	'gender',
    	'nisn',
        'status',
    	'graduate',
        'password',
    	'type_id'
    ];
    public function activation() {
       return $this->hasOne('App\Models\Activations', 'user_id');
    }
}
