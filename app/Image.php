<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //Constants image's type
	const MAIN_BANNER = 1;
	const GENERAL_BANNER = 2;
	const SIDE_BAR = 3;
	const LOGO = 4;
	const FOOTER = 5;

    const DIRECTORY = 'images/upload/image';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'images';

    /**
     * The attributes that are mass assignable.
     *s
     * @var array
     */
    protected $fillable = ['name', 'file', 'type', 'order', 'active', 'path', 'link'];

	/*
	    Return the path of the general banner
	*/
    public function getGeneralBannerPath(){
    	$banner = new Image();
    	$banner = $this->where('type', IMAGE::GENERAL_BANNER)->get()->first();       
    	return $banner;
    }

	/* 
	    Return the main activated banners orded by the order attribute
	*/
    public function getMainBanners(){
    	$banners = new Image();
    	$banners = $this->where('type', IMAGE::MAIN_BANNER)
    	->where('active', true)
    	->orderBy('order', 'asc')
    	->get();
    	return $banners;
    }

	/* 
	    Return the main activated banners orded by the order attribute
	*/
    public function getSideBarImages(){
    	$images = new Image();
    	$images = $this->where('type', IMAGE::SIDE_BAR)
    	->where('active', true)
    	->orderBy('order', 'asc')
    	->get();
    	return $images;
    }

	/*
	    Return the logo image
	*/
    public function getLogo(){
    	$logo = new Image();
    	$logo = $this->where('type', IMAGE::LOGO)->get()->first();        
    	return $logo;
    }

	/*
	    Return the footer image
	*/
    public function getFooter(){
    	$footer = new Image();
    	$footer = $this->where('type', IMAGE::FOOTER)->get()->first();        
    	return $footer;
    }

}

