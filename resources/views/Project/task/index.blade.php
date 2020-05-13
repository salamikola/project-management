@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session('success') }}
                        </div>
                    @endif
                                <div> 

                          <a href="{{action('TaskController@create')}}" class="taskproject">Create Task</a> 
                                <br>
                                <br>
                                @if(count($tasks) > 0) 
                                <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead class="thead-dark">
                                        <tr>
                                        <th>Task Name</th>
                                        <th >Project Name</th>
                                          <th class="col-sm-1">Task Desc</th>
                                           <th>Task Status</th>
                                           <th> Due Date </th>
                                           <th> Time Created </th>
                                           <th> Time Updated </th>
                                           <th> Update Task</th>
                                           <th> Delete Task</th>
                                                   </tr>
                                                </thead>
                                                  <tbody>
                        @foreach($tasks as $task)  
                             <tr>
            <td>{{$task->title}}
            </td>
            <td>{{$task->Project->title}}
            </td>
            <td>{{$task->description}}
            </td>
            <td>{{$task->status}}
            </td>
            <td>{{$task->due_date}} </td>
            <td>{{$task->created_at}}</td>
            <td>{{$task->updated_at}}</td>
            <td>
                <a href="{{action('TaskController@edit', ['id' => $task->id])}}" class="btn btn-success">Update</a>
            </td>
            <td>
                <a href="{{action('TaskController@destroy', ['id' => $task->id])}}" class="btn btn-danger">Remove</a>
            </td>
        </tr>
        @endforeach
                           </tbody>
                     </table>                               
                     @else
         No Task record found!
         @endif
                     </div>   
                      </div>  
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
