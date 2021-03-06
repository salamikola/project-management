@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    @include('project.sidebar')
        <div class="col-md-9">
            <div class="card">
                <div class="card-header"> <center> <b> {{ __('Update Project') }} <b> </center> </div>

                <div class="card-body">
                    <form method="POST" action="{{action('ProjectController@update', ['id' => $project->id])}}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Project Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('name') is-invalid @enderror" name="title" value="{{ $project->title }}" required autocomplete="name" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Project Description') }}</label>

                            <div class="col-md-6">
                            <textarea class="form-control" row="10" id="desc" name="desc"> {{ $project->description }} </textarea>

                                @error('desc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Due Date') }}</label>

                            <div class="col-md-6">
                                <input id="dob" type="date" class="form-control @error('duedate') is-invalid @enderror" name="duedate" value="{{ $project->due_date}}" required autocomplete="duedate">

                                @error('duedate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Project Status') }}</label>
                             <div class="col-md-6"> 
                                     <select class="form-control" id="sel1" name="status">
                                         <option value="Pending">Pending</option>
                                             <option value="Ongoing">Ongoing</option>
                                             <option value="Completed">Completed</option>
                                                </select>   
                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                                </div>
                                                   </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update Project') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection