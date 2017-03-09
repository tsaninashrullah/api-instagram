<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeUsers extends Model
{
	protected $table = 'type_users';
    protected $fillable = [
    	'name',
    ];
}
