<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\JobOpportunityRequest;

use App\JobOpportunity;

class JobOpportunitiesController extends Controller
{

    private $job;
    
    public function __construct()
    {        
        //Check if this user is a admin
        $this->middleware('admin', ['except' => ['jobDisplay']]);

        $this->job = new JobOpportunity();        
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //Return all the results
        $jobs = JobOpportunity::get();

        //Passing the Role to use its constants
        return view('admin.jobopportunity.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //Creating a new JobOpportunity. 
        $job = new JobOpportunity();

        //Sending to the creating page.
        return view('admin.jobopportunity.create', compact('job'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(JobOpportunityRequest $request)
    {
        //Creating a new JobOpportunity and filling up this with the form information.
        $job =  $this->job->create($request->all());

        //Sending the user to the main page
        return redirect()->route('job/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //Finding the desire job
        $job = $this->job->find($id);

        //Seding the selected job to the change page.
        return view('admin.jobopportunity.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //Finding the desire job
        $job = $this->job->find($id);

        //Seding the selected job to the change page.
        return view('admin.jobopportunity.edit', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(JobOpportunityRequest $request, $id)
    {
        //Find the job
        $job = $this->job->find($id);

        //Fill up this job with the new form's information
        $job->fill($request->all());

        //Save the job
        $job->save();

        //Sending the user to the main page
        return redirect()->route('job/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //Find the job
        $job = $this->job->find($id);

        //Delete the job
        $job->delete();

        //Sending the user to the main page
        return redirect()->route('job/index');
    }

    /* 
    Changes the status of the job opportunity
    */
    public function changeStatus($id){

        $job = $this->job->find($id);

        //Change the status
        if($job->active == true){
            $job->active = false;
        } else{
            $job->active = true;
        }

        //Save the change
        $job->save();        

        //Sending the user to the accounts page
        return redirect()->route('job/index');
    }

    /*
    Find all jobs and display on About section
    */
    public function jobDisplay(){

        $jobs = $this->job->where('active', true)->get();

        return view('pages.about.jobOpportunities', compact('jobs'));

    }
}
