<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{

    /* Arrays with the mapping of the pages */
    private $pages = array(
        'index'                             => 'pages.index',
        'about'                             => 'pages.about',
        'donate'                            => 'pages.donate',
        );


    private $studentPages = array(
        'faq'                               => 'pages.student.faq',
        'client'                            => 'pages.student.client',      
        );

    private $volunteerPages = array(
        'tutor'                             => 'pages.volunteer.tutor',
        'becomeavolunteer'                  => 'pages.volunteer.becomeavolunteer',
        'linkandfile'                       => 'pages.volunteer.linkandfile',
        'tutoringlocation'                  => 'pages.volunteer.tutoringlocation',
        'volunteerworkshop'                 => 'pages.volunteer.volunteerworkshop',  
        'tutorreport'                       => 'pages.volunteer.tutorreport',
        );

    private $eventPages = array(
        'calendar'                          => 'pages.event.calendar',
        );

    private $donatePages = array(
        'contribution'                      => 'pages.donate.contribution',
        'wishlist'                          => 'pages.donate.wishlist',
        );
    
    private $aboutPages = array(
        'theliteracycenter'                 => 'pages.about.theliteracycenter',        
        'boardofdirectors'                  => 'pages.about.boardofdirectors',
        );
    

    /*
    By the route information, this method will guide the user to the right page.
    $section = place of the website, for example, about, student
    $name = name of the page.
    */
    public function goToSectionPage($section, $name){

        switch ($section) {
            case 'student':
            $pageToGo = $this->studentPages[$name];
            break;

            case 'volunteer':
            $pageToGo = $this->volunteerPages[$name];
            break;

            case 'event':
            $pageToGo = $this->eventPages[$name];
            break;

            case 'donate':
            $pageToGo = $this->donatePages[$name];
            break;

            case 'about':
            $pageToGo = $this->aboutPages[$name];
            break;

            default:
            $pageToGo = $this->pages[$name];
        }       

        return view($pageToGo);
    }

    public function goToPage($name){

        $pageToGo = $this->pages[$name];

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
