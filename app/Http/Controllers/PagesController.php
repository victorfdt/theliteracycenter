<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{

    /* Arrays with the mapping of the pages */
    private $pages = array(
            'index'         => 'pages.index',
            'about'         => 'pages.about',
            'donate'         => 'pages.donate',
        );


    private $studentPages = array(
            'faq'   => 'pages.student.faq',
            'client'      => 'pages.student.client',      
        );

    private $volunteerPages = array(
            'tutor'   => 'pages.volunteer.tutor',
            'becomeavolunteer'      => 'pages.volunteer.becomeavolunteer',
            'linkandfile'           => 'pages.volunteer.linkandfile',
            'tutoringlocation'      => 'pages.volunteer.tutoringlocation',
            'volunteerworkshop'     => 'pages.volunteer.volunteerworkshop',  
            'tutorreport'           => 'pages.volunteer.tutorreport',
        );

    private $eventPages = array(
            'calendar'                 => 'pages.event.calendar',
        );

    private $donatePages = array(
            'contribution'             => 'pages.donate.contribution',
            'withlist'                 => 'pages.donate.wishlist',
        );

    public function goToPage($name){        

        $pageToGo = $this->pages[$name];

        return view($pageToGo);
    }

    public function goToStudentPage($name){

        $pageToGo = $this->studentPages[$name];

        return view($pageToGo);
    }

    public function goToVolunteerPage($name){

        $pageToGo = $this->volunteerPages[$name];

        return view($pageToGo);
    }

    public function goToEventPage($name){

        $pageToGo = $this->eventPages[$name];

        return view($pageToGo);
    } 

     public function goToDonatePage($name){

        $pageToGo = $this->donatePages[$name];

        return view($pageToGo);
    }    

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('pages.index');

    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function faq()
    {
        return view('pages.student.faq');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
