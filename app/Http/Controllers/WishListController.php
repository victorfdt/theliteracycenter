<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\WishListRequest;

use App\WishList;

class WishListController extends Controller
{

    private $wishlist;

    //Helps to order, upload and manage images;
    private $imageHelper;

    public function __construct()
    {
        //See if the there is an authenticated user
        $this->middleware('auth');

        //Check if this user is a admin
        $this->middleware('admin');

        $this->wishlist = new WishList();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $wishlist = WishList::get();
        return view('admin.wishlist.index', compact('wishlist'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function displayWishList()
    {
        $wishlist = WishList::get();
        return view('pages.donate.wishlist', compact('wishlist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.wishlist.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(WishListRequest $request)
    {
        //Create a new item of the wish list
        $item = $this->wishlist->create($request->all());
        $item->active = true;

        $item->save();

        return redirect()->route('wishlist/index');
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
        $item = WishList::find($id);
        return view('admin.wishlist.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, WishListRequest $request)
    {
        //Find the item from the wishlist
        $item = WishList::find($id);

        //Set the new information from the form
        $item->fill($request->all());
        $item->save();

        return redirect()->route('wishlist/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //Find the item from the wishlist
        $item = WishList::find($id);

        $item->delete();

        return redirect()->route('wishlist/index');
    }

    /* 
    Changes the status of the item
    */
    public function changeStatus($id){

        $item = WishList::find($id);

        //Change the status
        if($item->active == true){
            $item->active = false;
        } else{
            $item->active = true;
        }

        //Save the change
        $item->save();        

        //Sending the user to the accounts page
        return redirect()->route('wishlist/index');
    }
}
