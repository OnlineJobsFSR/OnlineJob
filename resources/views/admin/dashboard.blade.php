@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <div class="jumbotron">

            <!-- Authentication Links -->
            @if(Auth::user() && Auth::user()->role_id === 1)
                <h1>Admin dashboard</h1>
            @elseif(Auth::user() && Auth::user()->role_id === 2)
                <h1>Author dashboard</h1>
            @elseif(Auth::user() &&Auth::user()->role_id === 3)
                <h1>User dashboard</h1>
            @endif


        </div>
        <!--if user is admin -->
        @if(Auth::user() && Auth::user()->role_id === 1)

            <div class="col-md-12">

                <a href="{{route('jobs.new')}}" class="btn btn-primary btn-margin-right">Create job list</a>

                <a href="{{route('jobs.junk')}}" class="btn btn-danger btn-margin-right">Trashed jobs listings</a>

                <a href="{{route('categories.create')}}" class="btn btn-success btn-margin-right">Create new categorie</a>

                href="{{route('users.show')}}" class="btn btn-success btn-margin-right">Manage useres</a>

            </div>

        @endif

    <!--if user is author -->
        @if(Auth::user() && Auth::user()->role_id === 2)

            <div class="col-md-12">

                <a href="{{route('jobs.new')}}" class="btn btn-primary btn-margin-right">Create job list</a>

                <a href="{{route('categories.create')}}" class="btn btn-success btn-margin-right">Create new categorie</a>




            </div>

        @endif


    <!--if user is subscriber -->
        @if(Auth::user() && Auth::user()->role_id === 3)

            <div class="col-md-12">

                <a href="#" class="btn btn-primary btn-margin-right">What to do</a>


            </div>

        @endif


    </div>


@endsection
