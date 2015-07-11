<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller\BannersController;

class Banner extends Model
{
    //Constants of the roles
  	const MAIN_BANNER = 1;
  	const GENERAL_BANNER = 2;
    const SIDE_BAR = 3;
    const LOGO = 4;
    const FOOTER = 5;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'banners';

    /**
     * The attributes that are mass assignable.
     *s
     * @var array
     */
    protected $fillable = ['name', 'file', 'type', 'order', 'active'];

    /*
        Return the path of the general banner
    */
    public function getGeneralBannerPath(){
        $banner = new Banner();
        $banner = $this->where('type', Banner::GENERAL_BANNER)->get()->first();        
        return $banner;
    }

    /* 
        Return the main activated banners orded by the order attribute
    */
    public function getMainBanners(){
        $banners = new Banner();
        $banners = $this->where('type', Banner::MAIN_BANNER)
                        ->where('active', true)
                        ->orderBy('order', 'asc')
                        ->get();
        return $banners;
    }
}
