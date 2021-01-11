@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($jobs as $job)
            <h2><a href="{{route('jobs.display', $job->id)}}">{{$job->title}}</a></h2>
            <p>{{$job->body}}</p>

            <!--shownig who created blog-->
            @if($job->user)
                <strong>Author : </strong> <a href="{{ route('users.show', $job->user->name) }}"> {{ $job->user->name }} </a> | <strong>Posted</strong> {{ $job->created_at->diffForHumans() }}
            @endif
            <hr>
        @endforeach

    </div>


@endsection
