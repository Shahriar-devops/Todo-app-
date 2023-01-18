<?php
namespace App\Repositories\Upload;

interface UploadInterface{
    public function upload($folder,$image_id,$new_image);//folder = folder name,image_id = existing image id , new_image = upload new image
}
