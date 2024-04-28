<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

trait ImageTrait
{
    public function uploadImage($image, $directory, $default_img = USER_DEFAULT_IMG_PATH, $resize = false, $width = 600, $height = 400, $nullable = false)
    {
        if ($image) {
            $upload_path = public_path() . "/upload/{$directory}/";
            if (!file_exists($upload_path)) {
                File::makeDirectory($upload_path, $mode = 0777, true, true);
            }
            $file_ext = $image->getClientOriginalExtension();
            $filename = time() . round(microtime(true) * 1000) . '.' . $file_ext;

            if($resize) {
                $image = Image::make($image->getRealPath());

                $image->resize($width, $height, function ($constraint) {
                    $constraint->aspectRatio();
                });

                $image->save($upload_path . $filename);
            }else{
                $image->move($upload_path, $filename);
            }

            $image_url = "/upload/{$directory}/" . $filename;
            return $image_url;
        }
        return $nullable ? null : $default_img;
    }

    public function deleteImage($path, $default_img = USER_DEFAULT_IMG_PATH)
    {
        if ($path && $path != $default_img) {
            try {
                unlink(public_path() . $path);
            } catch (\Throwable $th) {
            }
        }
    }
}
