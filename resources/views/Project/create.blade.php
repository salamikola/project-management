@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
    @include('project.sidebar')
        <div class="col-md-9">
            <div class="card">
                <div class="card-header"> <center> <b> {{ __('Create New Project') }} <b> </center> </div>

                <div class="card-body">
                    <form method="POST" action="{{action('ProjectController@store')}}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Project Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('name') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="name" autofocus>

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
                            <textarea class="form-control" row="10" id="desc" name="desc"> </textarea>

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
                                <input id="dob" type="date" class="form-control @error('duedate') is-invalid @enderror" name="duedate" value="{{ old('duedate') }}" required autocomplete="duedate">

                                @error('duedate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create Project') }}
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