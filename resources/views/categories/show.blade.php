@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <div class="jumbotron">
            <h1>{{$category->name}}</h1>
            <div class="btn-group">

                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-margin-right"> Edit </a>

                <form action="{{ route('categories.destroy', $category->id) }}" method="post" >
                    {{method_field('delete')}}
                    <button class="btn btn-danger pull-left"> Delete </button>
                    {{csrf_field()}}
                </form>
            </div>
        </div>


        <div class="col-md-12">
            @foreach($category->job as $job)
                <h3><a href="{{ route('jobs.display', $job->id) }}" >{{ $job->title }}</a> </h3>
            @endforeach
        </div>

    </div>

@endsection
