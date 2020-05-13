<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Task;
use App\Models\User;

class Project extends Model
{
    //
    protected $fillable = [
        'title', 'description', 'due_date',
    ];

   public function User() {
     return $this->belongsTo('App\User');
   }

   public function Task()  {
    return $this->hasMany('App\Models\Task');
   }

    public function sidebar($userId) {
        
        $retVal['projects'] = $this->where('user_id', '=', $userId)->orderBy('id', 'asc')->get();
        $retVal['recentProjects'] = $this->where('user_id','=', $userId)->latest()->limit(5)->get();
        $retVal['pendingProjects'] = $this->where([['status', '=', 'Pending'],['user_id', '=', $userId]])->orderBy('id', 'asc')->get();
        $retVal['ongoingProjects'] = $this->where([['status', '=', 'Ongoing'],['user_id', '=', $userId]])->orderBy('id', 'asc')->get();
        $retVal['completedProjects'] = $this->where([['status', '=', 'Completed'],['user_id', '=', $userId]])->orderBy('id', 'asc')->get();
        $retVal['dueProjects'] = $this->where('user_id', '=', $userId)->whereDate('due_date',NOW())->orderBy('id', 'asc')->get();
        return $retVal;

    }

     public function adminSidebar () {

        $retVal['projects'] = $this->orderBy('id', 'asc')->get();
        $retVal['recentProjects'] = $this->latest()->limit(5)->get();
        $retVal['pendingProjects'] = $this->where('status', '=', 'Pending')->orderBy('id', 'asc')->get();
        $retVal['ongoingProjects'] = $this->where('status', '=', 'Ongoing')->orderBy('id', 'asc')->get();
        $retVal['completedProjects'] = $this->where('status', '=', 'Completed')->orderBy('id', 'asc')->get();
        $retVal['dueProjects'] = $this->whereDate('due_date',NOW())->orderBy('id', 'asc')->get();
        return $retVal;
    }
}
