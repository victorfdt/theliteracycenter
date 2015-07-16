<?php

namespace App\Http\Helpers;

class ImageHelper
{    
    /*
    Gets the image uploaded from the form, and moves it to the directory.
    */
    public function uploadImage($request, $model){
        //Getting the upload image
        $imageName = $request->input('name') . '.' . $request->file('image')->getClientOriginalExtension();

        //Moving the image to the folder, and getting the path
        $request->file('image')->move(base_path() . '/public/' . $model::DIRECTORY, $imageName);
        $imagePath = $model::DIRECTORY . '/' . $imageName;

        //Setting the path
        $model->path = $imagePath;
    }

    /*
    Move all images' order one step forward if the parameterized is already used
    $type = Type / category, for example, Image::MAIN_BANNER
    $oldOrder = number of order of the member before the changing
    $neworder = number of order informed by the admin
    $model = to access the correct tabel, is necessary pass the model
    */
    public function adjustUpdateOrder($type, $oldOrder, $newOrder, $model){        
        $howMoved = '';
        $images = '';        

        if($newOrder < $oldOrder){
            $howMoved = 'up';
        } else {            
            $howMoved = 'down';
        }

        if($howMoved == 'up') {

            $images = $model->where('type', $type)
            ->where('order','<', $oldOrder)
            ->where('order','>=', $newOrder)
            ->get();

            foreach ($images as $image) {

                $image->order = $image->order + 1;
                $image->save();
            }           

        } else {         
            $images = $model->where('type', $type)
            ->where('order','>', $oldOrder)
            ->where('order','<=', $newOrder)
            ->get();

            foreach ($images as $image) {

                $image->order = $image->order - 1;
                $image->save();
            }
        }        
    }

    /*
    Adjusts the order in the moment of creation
    */
    public function adjustStoreOrder($type, $order, $model){

        $itens = $model->where('type', $type)->where('order', '>=', $order)->get();
       
        foreach ($itens as $item) {
            $item->order = $item->order + 1;
            $item->save();
        }

    }

    /*
    Adjusts the order when deleting.
    */
    public function adjustDestroyOrder($type, $order, $model){

        $itens = $model->where('type', $type)->where('order', '>=', $order)->get();
       
        foreach ($itens as $item) {
            $item->order = $item->order - 1;
            $item->save();
        }

    }

    /*
    Verify if the file image uploaded is bigger than the limit.
    */
    public function fileImageSizeExceeded($imageFile){
        $error = false;

        if($imageFile != null){
            if($imageFile->getError() == 1 && $imageFile->getClientSize() == 0){
                $error = true;
            }
        }

        return $error;
    }

}
