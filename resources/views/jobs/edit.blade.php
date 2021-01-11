@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="jumbotron">
            <h1>Edit job list</h1>
        </div>
        <div class="col-md-12">
            <form action="{{route('jobs.store', $job->id) }}" method="post">
                {{method_field('patch')}}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" value="{{$job->title}}">
                    <label for="body">Body</label>
                    <textarea type="text" name="body" class="form-control"> {{$job->body}}     </textarea>
                </div>

                <div class="form-group form-check form-check-inline">
                   <strong>{{ $job->category->count() ? 'Current categories ' : '' }} &nbsp;</strong>
                    @foreach($job->category as $category)
                        <input type="checkbox" value="{{$category->id}}" name="category_id[]" class="form-check-input" checked>
                        <label class="form-check-label btn-margin-right">{{$category->name}}</label>
                    @endforeach
                </div>

                <div class="form-group form-check form-check-inline">
                    <strong>{{ $filtered->count() ? 'Current categories ' : '' }} &nbsp;</strong>
                    @foreach($filtered as $category)
                        <input type="checkbox" value="{{$category->id}}" name="category_id[]" class="form-check-input" >
                        <label class="form-check-label btn-margin-right">{{$category->name}}</label>
                    @endforeach
                </div>


                <div>
                <button class="btn btn-primary" type="submit">Update job list</button>
                </div>
                {{ csrf_field() }}
            </form>
        </div>
    </div>

@endsection
