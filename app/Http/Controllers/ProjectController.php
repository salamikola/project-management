<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Project;
use Illuminate\Http\Request;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
       public function index()
    {
        //
        $userId = Auth::user()->id; 
        $project = new Project();
        $projects = Project::where('user_id', '=', $userId)->orderBy('id', 'asc')->get();
        $summary = $project->sidebar($userId);
        $recentProjects = $summary['recentProjects'];
        $dueProjects = $summary['dueProjects'];
        $ongoingProjects = $summary['ongoingProjects'];
        $pendingProjects = $summary['pendingProjects'];
        $completedProjects = $summary['completedProjects'];

      
        return view('project.index', compact('projects','recentProjects','dueProjects','ongoingProjects','pendingProjects','completedProjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $userId = Auth::user()->id; 
        $project = new Project();
        $summary = $project->sidebar($userId);
        $projects =$summary['projects'];
        $recentProjects = $summary['recentProjects'];
        $dueProjects = $summary['dueProjects'];
        $ongoingProjects = $summary['ongoingProjects'];
        $pendingProjects = $summary['pendingProjects'];
        $completedProjects = $summary['completedProjects'];
        return view('project.create',compact('projects','recentProjects','dueProjects','ongoingProjects','pendingProjects','completedProjects')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
     $UserId = Auth::user()->id;
     $data =  $request->validate([

            'title' =>[ 'required','string','max:255'],
            'desc' => [ 'required','string','max:255'],
            'duedate' => [ 'required','date','max:255'],

        ]);

        $title = $data['title'];
        $desc = $data['desc'];
        $date = $data ['duedate'];

        $NewProject = new Project;
        $NewProject->title = $title;
        $NewProject->description = $desc;
        $NewProject->due_date =$date;
        $NewProject->user_id = $UserId;
        $NewProject->save();

        return redirect('/project')->with('success','Project has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
        $id =  request()->id ;
        $project = Project::find($id);
        $userId = Auth::user()->id; 
        $projects = new Project();
        $summary = $projects->sidebar($userId);
        $projects =$summary['projects'];
        $recentProjects = $summary['recentProjects'];
        $dueProjects = $summary['dueProjects'];
        $ongoingProjects = $summary['ongoingProjects'];
        $pendingProjects = $summary['pendingProjects'];
        $completedProjects = $summary['completedProjects'];
       return view('project.edit', compact('project','recentProjects','dueProjects','ongoingProjects','pendingProjects','completedProjects','projects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
        $request->validate([
            'title'=>'required',
            'desc'=>'required',
            'status'=>'required',
            'duedate'=>'required',
        ]);

         $id =  request()->id;

        $UpdateProject = Project::find($id);
        $UpdateProject->title=  $request->get('title');
        $UpdateProject->description = $request->get('desc');
        $UpdateProject->status =$request->get('status');
        $UpdateProject->due_date = $request->get('duedate');
        $UpdateProject->save(); 

        return redirect('/project')->with('success','Project has been updated successfully.');
        
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //

        $id =  request()->id; 
        $project = Project::find($id);
        echo $id;
        $project->delete();
       return redirect('/project')->with('success', 'project deleted!');
    }

    
}
