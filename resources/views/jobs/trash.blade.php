@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="jumbotron">
        <h1>Trashed job lists</h1>
    </div>

</div>
<div class="col-md-12">
    @foreach($trashedJobs as $job)
        <h2>{{$job->title}}</h2>
        <p>{{$job->body}}</p>

    <div class="btn-group">
        <!--restore-->
        <form action="{{route('jobs.restore', $job->id)}} " method="get">
            <button class="btn btn-success btn-xs pull-left btn-margin-right" type="submit">Restore</button>
            {{csrf_field()}}
        </form>

        <!--delete permanent-->
        <form action="{{route('jobs.permanent-delete', $job->id)}} " method="post">
            {{method_field('delete')}}
            <button class="btn btn-danger btn-xs pull-left btn-margin-right" type="submit">Permanent delete</button>
            {{csrf_field()}}
        </form>

    </div>

    @endforeach
</div>


@endsection


