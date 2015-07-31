<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Helpers\ImageHelper;
use App\Http\Requests\EventsRequest;
use File;
use Session;
use Carbon\Carbon;
use \DateTime;
use App\Event;

class EventsController extends Controller
{

    private $EventsController;

    //Helps to order, upload and manage images;
    private $imageHelper;

    public function __construct()
    {        
        //Check if this user is a admin
        $this->middleware('admin');

        $this->event = new Event();

        $this->imageHelper = new ImageHelper();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //Find the events
        $events = Event::get();

        return view('admin.event.index', compact('events'));
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function displayEvents()
    {
        //Find the events
        $events = Event::orderBy('date', 'asc')->get();

        return view('pages.event.main_events', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(EventsRequest $request)
    {
        //Creating the new event
        $event = Event::create($request->all());
        $event->date = new Carbon($request->input('date'));  

        //Moves and sets the uploaded image
        if(!empty($request->file('image'))){
            $this->imageHelper->uploadImage($request, $event); 
        }

        //Save
        $event->save();

        //Sending the user to the event page
        return redirect()->route('event/index'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //Find the event
        $event = Event::find($id);

        return view('admin.event.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $event = Event::find($id);
        $formattedDate = new DateTime($event->date);
        $formattedDate = $formattedDate->format('m-d-Y');
        $formattedDate = str_replace('-','/', $formattedDate);

        return view('admin.event.edit', compact('event', 'formattedDate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(EventsRequest $request, $id)
    {
        //Find the event
        $event = Event::find($id);

        //Fill up with the new informations
        $event->fill($request->all());
        $event->date = new Carbon($request->input('date'));

        //If the user changed the image.
        if($request->hasFile('image')){
            //Delete the old member image from the filesystem
            File::delete($event->path);

            //Moves and sets the new uploaded image
            $this->imageHelper->uploadImage($request, $event); 
        }

        //Save the changes        
        $event->save();

        //Sending the user to the event page
        return redirect()->route('event/index'); 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
         //Find the event
        $event = Event::find($id);

        //Delete the event image on the filesystem

        File::delete($event->path);

        //Delete the event from the database
        $event->delete();        
        
        //Sending the user to the accounts page
        return redirect()->route('event/index');
    }
}
