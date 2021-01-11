@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="jumbotron">
            <h1>Create new job list</h1>
        </div>
        <div class="col-md-12">
            <form action="{{route('jobs.save')}}" method="post">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control">
                    <label for="body">Body</label>
                    <textarea type="text" name="body" class="form-control"></textarea>
                </div>

                <div class="form-group form-check form-check-inline">
                    @foreach($categories as $category)
                        <input type="checkbox" value="{{$category->id}}" name="category_id[]" class="form-check-input">
                        <label class="form-check-label btn-margin-right">{{$category->name}}</label>
                    @endforeach
                </div>

                <div>
                    <button class="btn btn-primary" type="submit">Create new job list</button>
                </div>

            {{ csrf_field() }}
            </form>
        </div>
    </div>

@endsection
