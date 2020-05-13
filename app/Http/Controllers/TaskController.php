<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Project;


class TaskController extends Controller
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
    
    $UserId = Auth::user()->id; 
    $id =  request()->id ;
    session(['ProjectId' => $id]);
    $ProjectId = session()->get('ProjectId');
    $tasks = Task::with('Project:id,title,status,due_date')->where([['user_id', '=', $UserId],['project_id', '=',$ProjectId,]])->get();
      
     return view('project.task.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('project.task.create');
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
    $ProjectId = session()->get('ProjectId');
    $NewTask = new Task;
    $NewTask->title = $title;
    $NewTask->description = $desc;
    $NewTask->project_id = $ProjectId;
    $NewTask->due_date =$date;
    $NewTask->user_id = $UserId;
    $NewTask->save();

    return redirect()->action(
        'TaskController@index', ['id' => $ProjectId]
    )->with('success','Task has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
        $id =  request()->id ;
        $task = Task::find($id);
       return view('project.task.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //

        $request->validate([
            'title'=>'required',
            'desc'=>'required',
            'status'=>'required',
            'duedate'=>'required',
        ]);

         $id =  request()->id;

        $UpdateTask = Task::find($id);
        $UpdateTask->title=  $request->get('title');
        $UpdateTask->description = $request->get('desc');
        $UpdateTask->status =$request->get('status');
        $UpdateTask->due_date = $request->get('duedate');
        $UpdateTask->save(); 
        $ProjectId = session()->get('ProjectId');
        return redirect()->action(
            'TaskController@index', ['id' => $ProjectId]
        )->with('success','Task has been updated successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
        $id =  request()->id; 
        $task = Task::find($id);
        $task->delete();
        $ProjectId = session()->get('ProjectId');
        return redirect()->action(
            'TaskController@index', ['id' => $ProjectId]
        )->with('sucess','Task has been deleted successfully');
    }
}
