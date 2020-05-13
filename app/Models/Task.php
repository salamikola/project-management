<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use App\Models\User;

class Task extends Model
{
    //

    protected $fillable = [
        'title', 'description', 'due_date',
    ];   

    public function Project()
    { 
        return $this->belongsTo('App\Models\Project');
    }

    public function User() {
    	return $this->belongsTo('App\User');
    }

   
}
