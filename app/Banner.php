<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller\BannersController;

class Banner extends Model
{
    //Constants of the roles
  	const MAIN = 1;
  	const GENERAL = 2;
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
    protected $fillable = ['name', 'path', 'type', 'order', 'active'];

    public function getGeneralBannerPath(){
        $banner = $this->where('type', Banner::GENERAL)->get()->first();        
        return $banner->path;
    }
}
