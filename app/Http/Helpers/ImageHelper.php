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
    $order = number of order of the inserted/updated/deleted model
    $model = to access the correct tabel, is necessary pass the model
    $action = string explaning the action, for example 'destroy'
    */
    public function adjustOrder($type, $order, $model, $action){
        $logic = '';

        if($action == 'destroy'){
            $logic = '>';
        } else if($action == 'update' || $action == 'store'){
            $logic = '>=';
        }

        $images = $model->where('type', $type)->where('order',$logic, $order)->get();  

        if($action == 'destroy'){
            foreach ($images as $image) {

                $image->order = $image->order - 1;
                $image->save();
            }
        } else {
            foreach ($images as $image) {

                $image->order = $image->order + 1;
                $image->save();
            }
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
