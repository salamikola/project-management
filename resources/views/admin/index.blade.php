@extends('admin.navbar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    @include('admin.sidebar')
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div> 

      <br>
      @if(count($project) > 0) 
      <div class="table-responsive">
      <table class="table table-striped">
          <thead class="thead-dark">
              <tr>
              <th>Project Name</th>
              <th >Project Description</th>
                <th> Project By</th>
                 <th>Task Status</th>
                 <th> Due Date </th>
                 <th> Time Created </th>
                 <th> Time Updated </th>
                 <th> View Project </th>
                         </tr>
                      </thead>
                        <tbody>
@foreach($project as $project)  
   <tr>
<td>{{$project->title}}
</td>
<td>{{$project->description}}
</td>
<td>{{$project->User->username}}
</td>
<td>{{$project->status}}
</td>
<td>{{$project->due_date}} </td>
<td>{{$project->created_at}}</td>
<td>{{$project->updated_at}}</td>
<td>
<a href="#" class="btn btn-success">View Project</a>
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
@endsection