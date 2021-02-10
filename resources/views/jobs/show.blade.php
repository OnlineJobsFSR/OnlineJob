@extends('layouts.app')

@section('content')

    <div class="container-fluid">

        <article>

            <div class="jumbotron">
                <div class="col-md-12">
                    <h1>{{$job->title}}</h1>
                </div>

                @if(Auth::user())
                    @if(Auth::user()->role_id === 1 || Auth::user()->role_id === 2 && Auth::user()->id === $job->user_id)
                <div class="btn-group">
                    <a class="btn btn-primary btn-xs pull-left btn-margin-right btn-margin-right" type="submit" href="{{route('jobs.modify', $job->id)}}"> Edit  </a>
                    <form action="{{route('jobs.remove', $job->id)}}" method="post">
                        {{method_field('delete')}}
                        <button class="btn btn-danger btn-xs pull-left" type="submit">Delete</button>
                        {{ csrf_field() }}
                    </form>
                </div>
                    @endif
                    @endif
            </div>

            <div class="col-md-12">
                <!--shownig who created blog-->
                @if($job->user)
                    <strong>Author : </strong> <a href=" {{ route('users.show', $job->user) }}"> {{ $job->user->name }} </a> | <strong>Posted</strong> {{ $job->created_at->diffForHumans() }}
                @endif
                <hr>
                <p>{{$job->body}}</p>
                <hr>
               <strong> Category : </strong>
                @foreach($job->category as $category)
                    <span> <a href="{{ route('categories.show', $category->slug) }}"> {{ $category->name }}</a> </span>

                @endforeach
            </div>

        </article>

    </div>

@endsection
