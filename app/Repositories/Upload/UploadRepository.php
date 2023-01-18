<?php
namespace App\Repositories\Upload;

use App\Models\Upload;
use App\Repositories\Upload\UploadInterface;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
class UploadRepository implements UploadInterface{
    public function upload($folder='', $image_id='', $new_image)
    {
        try {

            //new image store path
            $image_path = '';
            if(!blank($new_image)):
                $image_folder_path = public_path('uploads/'.$folder);
                //new folder create if does not exist this folder
                if(!File::exists('uploads')):
                    File::makeDirectory('uploads');
                endif;
                if(!File::exists($image_folder_path)):
                    File::makeDirectory($image_folder_path);
                endif;
                $image_name             = date('YmdHisA').Str::random(5).'.'.$new_image->getClientOriginalExtension();
                $new_image->move($image_folder_path,$image_name);
                $folder                 = !blank($folder)? $folder.'/':$folder;
                $image_path             = 'uploads/'.$folder.$image_name;
            endif;
            //end new image store path

            $upload  = Upload::find($image_id);
            if($upload):
                if($upload && $new_image && File::exists(public_path($upload->original))):
                    unlink(public_path($upload->original)); //delete existing image
                endif;
            elseif(!blank($new_image)):
                $upload  = new Upload();
            else:
                return null;
            endif;
            if(!blank($image_path)):
                $upload->original   = $image_path;
            endif;
            $upload->save();

            return $upload->id;

        } catch (\Throwable $th) {
            return null;
        }
    }
}
