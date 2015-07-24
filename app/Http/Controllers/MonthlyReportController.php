<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\MonthlyReportRequest;

use App\MonthlyReport;
use App\Session;
use Auth;

class MonthlyReportController extends Controller
{  

    private $report;

    public function __construct()
    {     
        //Check if this user is a volunteer
        $this->middleware('monthlyreport');

        $this->report = new MonthlyReport();
    }  
    

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(){
        $authUser = Auth::user();

        //if the user is an Admin, so it should make the proper research.
        $report = new MonthlyReport();
        if($authUser->isAdmin()){
            //Find the reports
            $reports = MonthlyReport::orderBy('status', 'asc')
            ->orderBy('month', 'desc')
            ->orderBy('user_id', 'asc')->get();

        } else {
            //Find the reports
            $reports = MonthlyReport::where('user_id', $authUser->id)
            ->orderBy('status', 'asc')
            ->orderBy('month', 'desc')->get();
        }        
        
        //Return to view
        return view('volunteer.monthlyreport.index', compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $userId = Auth::user()->id;
        $report = $this->report;
        //Return the view and pass the private variable of the class
        return view('volunteer.monthlyreport.create', compact('report', 'userId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(MonthlyReportRequest $request)
    {
        //Creating the new monthly report
        $report = $this->report->create($request->all());

        //Creating the new sessions        
        $sessionsIds = array();
        foreach ($request->input('new', array()) as $id => $sessionData)
        {           
            $session = new Session;
            $session->fill($sessionData);
            $session->monthly_report_id = $report->id;
            $session->save();
        }       

        //Sending the user to the monthly report
        return redirect()->route('monthlyreport/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //Find the report
        $report = MonthlyReport::find($id);

        return view('volunteer.monthlyreport.show', compact('report'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $userId = Auth::user()->id;
        $report = MonthlyReport::find($id);
        //Return the view and pass the private variable of the class
        return view('volunteer.monthlyreport.edit', compact('report', 'userId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(MonthlyReportRequest $request, $id)
    {
        //Find report
        $report = MonthlyReport::find($id);        

        //##Updating the old sessions
        $sessionsIds = array();
        foreach ($request->input('old', array()) as $id => $sessionData)
        {           
            $session = Session::find($id) ?: new Session;
            $session->fill($sessionData);
            $session->save();
            $sessionsIds[] = $session->id;
        }

        //##Delete the unused sessions
        //Getting all sessions ids        
        foreach ($report->sessions() as $session) {
            $sessionsToRemove[] = $session->id;
        }

        //The ids that are different from sessionsIds, must be deleted
        $sessionsToRemove = array_diff($sessionsToRemove, $sessionsIds);
        foreach ($sessionsToRemove as $id) {
            Session::find($id)->delete();
        }

        //##Inserting new sessions        
        //Creating the new sessions        
        $sessionsIds = array();
        foreach ($request->input('new', array()) as $id => $sessionData)
        {           
            $session = new Session;
            $session->fill($sessionData);
            $session->monthly_report_id = $report->id;
            $session->save();
        }  

        //Sending the user to the monthly report
        return redirect()->route('monthlyreport/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //Find the report and delete
        $report = MonthlyReport::find($id);
        $report->delete();


        //Sending the user to the monthly report
        return redirect()->route('monthlyreport/index');
    }

    /*
        Change the status of the report as Read/OLD
    */
    public function changeStatus($id){

        //Find the report
        $report = MonthlyReport::find($id);

        $report->status = MonthlyReport::OLD;
        $report->save();

        //Sending the user to the monthly report
        return redirect()->route('monthlyreport/index');
    }

   
}
