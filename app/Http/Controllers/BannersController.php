<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;

use App\Banner;

class BannersController extends Controller
{

    private $banner;

    public function __construct()
    {
        //See if the there is an authenticated user
        $this->middleware('auth');

        //Check if this user is a admin
        $this->middleware('admin');

        $this->banner = new Banner();        
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //Return all the results
        $banner = $this->banner->get();

        //Passing the Role to use its constants
        return view('admin.banner.index', compact('banner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.banner.create', compact('banner'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(BannerRequest $request)
    {
        //Creating the new user
        $this->banner = $this->banner->create($request->all());
        $this->banner->active = true;

        $this->banner->save();

        //Sending the user to the accounts page
        return redirect()->route('banners.index');
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
        $banner = $this->banner->find($id);              
        return view('admin.banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, BannerRequest $request)
    {
        //Fill the banner with the new form fields
        $banner = $this->banner->find($id);
        $banner->fill($request->all());
        $banner->save();

        //Sending the user to the accounts page
        return redirect()->route('banners.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->banner->find($id)->delete();

        //Sending the user to the accounts page
        return redirect()->route('banners.index');
    }

    /* 
        Changes the status of the image
    */
    public function changeStatus($id){
        $banner = $this->banner->find($id);       

        if($banner->active == true){
            $banner->active = false;
        } else{
            $banner->active = true;
        }

        $banner->save();

        //Sending the user to the accounts page
        return redirect()->route('banners.index');
    }
}
