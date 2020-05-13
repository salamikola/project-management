<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Admin;
use App\Models\Task;
use App\Models\User;
use Auth;

class AdminLoginController extends Controller
{
    // this controller handles the login and logout functionality of admins



     public function index() {

        $projectCollection = new Project ();
        $summary = $projectCollection->adminSidebar();
        $projects = $summary['projects'];
        $recentProjects = $summary['recentProjects'];
        $dueProjects = $summary['dueProjects'];
        $ongoingProjects = $summary['ongoingProjects'];
        $pendingProjects = $summary['pendingProjects'];
        $completedProjects = $summary['completedProjects'];

        $project = Project::with('Task:id,title,status,description,due_date,created_at,updated_at','User:id,username')->get();
        return view('admin.index',compact('project','projects','recentProjects','dueProjects','ongoingProjects','pendingProjects','completedProjects'));
           
    }
       

    public function showAdminLogin() {
        return view('admin.login');
    }

    public function adminLogin(Request $request) {
        //validate the login details from the user
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        $email = $data['email'];
        $password = $data['password'];
      
      
        //logging in the user, redirect to index after succesful logins

        if (Auth::guard('admin')->attempt(['email' => $email, 'password' => $password])) {
            
            return redirect()->route('adminIndex');
        }

        // if login is not successful then redirect back to the login page
        else{
          return back()->with('errorMessage', 'Your password or email is incorrect');
        }
    }

    public function logout() {
        Auth::guard('admin')->logout();
        return redirect()->action('Auth\AdminLoginController@showAdminLogin');
    }
}
