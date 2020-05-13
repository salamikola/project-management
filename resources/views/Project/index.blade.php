@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
    @include('project.sidebar')
        <div class="col-md-9 col-lg-9 col-xl-9 col-sm-12">
            <div class="card">
                <div class="card-header">Your Project Management System</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session('success') }}
                        </div>
                    @endif
                                <div> 

                          <a href="{{action('ProjectController@create')}}" class="createproject"> + Create Project </a> 
                                <br>
                                <br>
                                @if(count($projects) > 0) 
                                <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead class="thead-dark">
                                        <tr>
                                        <th>Project Name</th>
                                          <th class="col-sm-4">Project Desc</th>
                                           <th>Project Status</th>
                                           <th> Due Date </th>
                                           <th> View Task</th>
                                           <th> Update Project</th>
                                           <th> Delete Project</th>
                                                   </tr>
                                                </thead>
                                                  <tbody>                                   
                            @foreach($projects as $project)      
                             <tr>
            <td>{{$project->title}}
            </td>
            <td>{{$project->description}}  
            </td>
            <td>{{$project->status}}  
            </td>
            <td>{{$project->due_date}} </td>
            <td>
                <a href="{{action('TaskController@index', ['id' => $project->id])}}" class="btn btn-primary">View Tasks</a>
            </td>
            <td>
                <a href="{{action('ProjectController@edit', ['id' => $project->id])}}" class="btn btn-success">Update</a>
            </td>
            <td>
                <a href="{{action('ProjectController@destroy', ['id' => $project->id])}}" class="btn btn-danger">Remove</a>
            </td>
        </tr>
        @endforeach
                           </tbody>
                     </table>                               
                     @else
         No Project record found!
         @endif
                          </div>
                     </div>     
                    
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection
