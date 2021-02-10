<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

//using model job for getting data
use App\Models\Job;

class JobsController extends Controller
{
    public function __construct() {
        $this->middleware('admin', ['only'=> 'trash', 'delete','permanentDelete','restore']);
        $this->middleware('author', ['only'=> ['create', 'store','edit','update']]);
    }



    //methode for showing blogs from db
    public function index() {
        //get all jobs from table
        $jobs = Job::latest()->get();

        //returning view witch is in blog folder named index
        return view('jobs.index', compact('jobs'));
    }

    //function for creating jobs
    public function create() {
        $categories = Category::latest()->get();
        return view('jobs.create', compact('categories'));
    }

    //methode for storing data from form

    public function store(Request $request) {
    //with request variable we can crate instance of request data in form
    //dd($request->body);
        $jobByUser = $request->user()->jobs()->create();
        $jobByUser->title = $request->title;
        $jobByUser->body = $request->body;
        $jobByUser->save();

        //sync with categories
        if ($request->category_id) {
            $jobByUser->category()->sync($request->category_id);
        }
        return redirect('/jobs');
    }

    //function for showing particalr job with id
    public function show($id) {
        //take id and found particular job
        $job = Job::findorFail($id);
        return view('jobs.show', compact('job'));

    }

    //function for editing jobs list
    public function edit($id) {
        $categories = Category::latest()->get();
        $job = Job::findorFail($id);
        $jc = [];

        foreach ($job->category as $c) {
            $jc[] =  $c->id-1;
        }

        /** @var TYPE_NAME $filtered */
        $filtered=array_except($categories, $jc);

        return view('jobs.edit', ['job' =>$job, 'categories'=>$categories, 'filtered'=>$filtered ]);
    }

    //for updating edited post
    public function update(Request $request, $id) {
        $input = $request->all();
        $job = Job::findorFail($id);
        $job->update($input);
        //sync with categories
        if ($request->category_id) {
            $job->category()->sync($request->category_id);
        }

        return redirect('/jobs');
    }

    //for deleting selected job list
    public function delete(Request  $request,$id) {
        $job = Job::findorFail($id);
        $job->delete();
        return redirect('/jobs');
    }

    //for jobs that are in trash
    public function trash() {
        $trashedJobs = Job::onlyTrashed()->get();
        return view('jobs.trash', compact('trashedJobs'));
    }

    //function for restoring deleted job list
    public function restore($id) {
        $restoredJob = Job::onlyTrashed()->findOrFail($id);
        $restoredJob->restore($restoredJob);
        return redirect('/jobs');

    }

    //fun for permanentli deleting job list
    public function permanentDelete($id) {
        $permanentDeleteJob = Job::onlyTrashed()->findOrFail($id);
        $permanentDeleteJob->forceDelete($permanentDeleteJob);
        return redirect('/jobs');
    }
}
