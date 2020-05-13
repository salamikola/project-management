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

                          <a href="{{action('ProjectController@create')}}" class="createproject"> Create Project </a> 
                                <br>
                                <br>
                                <table class="table table-striped">
                                    <thead class="thead-dark">
                                        <tr>
                                        <th>Project Name</th>
                                          <th>Project Desc</th>
                                           <th>Project Status</th>
                                           <th> Due Date </th>
                                           <th> Time Created </th>
                                           <th> Time Updated </th>
                                           <th> View Task</th>
                                                   </tr>
                                                </thead>
                                                  <tbody>
                                                        <tr>
                                           <td>John</td>
                                                 <td>Doe</td>
                                                <td>Pending</td>
                                                <td>21-12-2019</td>
                                                <td>22-09-2019</td>
                                                <td>22-09-2019</td>
                                                <td> <a href="#"> View Tasks </a> </td>
                                                         </tr>
                                                                 <tr>
                                                                 <td>John</td>
                                                 <td>Doe</td>
                                                <td>Pending</td>
                                                <td>21-12-2019</td>
                                                <td>22-09-2019</td>
                                                <td>22-09-2019</td>
                                                <td> <a href="#"> View Tasks </a> </td>
                                                         </tr>
                                                            <tr>
                                                            <td>John</td>
                                                 <td>Doe</td>
                                                <td>Pending</td>
                                                <td>21-12-2019</td>
                                                <td>22-09-2019</td>
                                                <td>22-09-2019</td>
                                                <td> <a href="#"> View Tasks </a> </td>
                                                              </tr>
                                                              <tr>
                                                              <td>John</td>
                                                 <td>Doe</td>
                                                <td>Pending</td>
                                                <td>21-12-2019</td>
                                                <td>22-09-2019</td>
                                                <td>22-09-2019</td>
                                                <td> <a href="#"> View Tasks </a> </td>
                                                              </tr>
                                                     </tbody>
                                             </table>


                               

                     </div>     
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
