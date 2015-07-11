<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Image;

/* 
    This service provider handle the loading of banners.
*/
    class ViewImageServiceProvider extends ServiceProvider
    {
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
     $this->composeGeneralBanner();
     $this->composeMainBanners();
     $this->composeLogo();
     $this->composeFooter();
     $this->composeSideBar();
 }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function composeGeneralBanner(){        
        view()->composer('sections.banner', function($view){
            $banner = new Image();            
            $view->with('banner', $banner->getGeneralBannerPath());
        });
    }

    public function composeMainBanners(){
        view()->composer('sections.banner_home', function($view){
            $mainBanners = new Image();
            $view->with('mainBanners', $mainBanners->getMainBanners());
        });
    }

    public function composeLogo(){
        view()->composer('sections.logo', function($view){
            $logo = new Image();
            $view->with('logo', $logo->getLogo());
        });
    }

    public function composeFooter(){
        view()->composer('sections.footer', function($view){
            $footer = new Image();
            $view->with('footer',$footer->getFooter());

        });
    }

    public function composeSideBar(){
        view()->composer('sections.right_bar', function($view){
            $sideBarImages = new Image();
            $view->with('sideBarImages', $sideBarImages->getSideBarImages());

        });
    }
}
