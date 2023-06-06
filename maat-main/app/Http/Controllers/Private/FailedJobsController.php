<?php

namespace App\Http\Controllers\Private;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Failed_jobs;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;

class FailedJobsController extends Controller
{
    public function index()
    {
        $failed_job = Failed_jobs::all();

        return Inertia::render('PrivateMaat/Failed_jobs/Failed_jobsIndex', compact('failed_job'));
    }

    //CREATE AND STORE
    public function create()
    {
        return Inertia::render('PrivateMaat/Failed_jobs/Failed_jobsCreate');
    }

    public function store(Request $request)
    {
        $failed_job = new Failed_jobs();
        $failed_job->uuid = $request->uuid;
        $failed_job->connection = $request->connection;
        $failed_job->queue = $request->queue;
        $failed_job->payload = $request->payload;
        $failed_job->exception = $request->exception;
        $failed_job->failed_at = $request->failed_at;
        $failed_job->save();

        return Redirect::route('indexFailed_jobs');
    }

    //EDIT AND UPDATE

    public function edit($id)
    {
        $failed_job = Failed_jobs::findOrFail($id);
        return Inertia::render('PrivateMaat/Failed_jobs/Failed_jobsEdit', compact('failed_job'));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $failed_job = Failed_jobs::findOrFail($id);

        $failed_job->update([
            'uuid' => $request->uuid,
            'connection' => $request->connection,
            'queue' => $request->queue,
            'payload' => $request->payload,
            'exception' => $request->exception,
            'failed_at' => $request->failed_at,
        ]);

        return Redirect::route('indexFailed_jobs');
    }

    //DELETE
    public function destroy($id)
    { 
        $failed_job = Failed_jobs::findOrFail($id);
        $failed_job->delete();
        return back();
    }
}
