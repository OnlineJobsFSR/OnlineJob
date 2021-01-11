@extends('layouts.app')

@section('content')

    <div class="container">
        <h3> {{ $user->name }} 's recent josb lists</h3>
        <strong>Role : {{ $user->role->name }}</strong>
        <hr>
        @foreach($user->jobs as $job)
            <h4><a href="{{ route('jobs.show', $job->id) }}">{{ $job->title }}</a> </h4>
        @endforeach
    </div>



@endsection
