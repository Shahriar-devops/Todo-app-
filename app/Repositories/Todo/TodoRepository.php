<?php
namespace App\Repositories\Todo;

use App\Enums\TodoStatus;
use App\Models\Backend\Todo;
use App\Models\Upload;
use App\Repositories\Todo\TodoInterface;
use App\Repositories\Upload\UploadInterface;
use Illuminate\Support\Facades\File;

class TodoRepository implements TodoInterface{
        protected $upload;
        public function __construct(UploadInterface $upload)
        {
            $this->upload = $upload;
        }

        public function all(){
            return Todo::orderByDesc('id')->paginate(10);
        }

        public function get($id){
            return Todo::find($id);
        }

        public function store($request){
            try {
                $todo               = new Todo();
                $todo->title        = $request->title;
                $todo->user_id      = $request->user;
                $todo->date         = $request->date;
                $todo->description  = $request->description;
                $todo->status       = TodoStatus::PENDING;
                if($request->todoFile):
                    $todo->todo_file = $this->upload->upload('todo','',$request->todoFile);
                endif;
                $todo->save();
                return true;
            }
            catch (\Exception $e) {

                return false;
            }
        }

        public function update($request,$id)
        {
            try {
                $todo               = Todo::find($id);
                $todo->title        = $request->title;
                $todo->user_id      = $request->user;
                $todo->date         = $request->date;
                $todo->description  = $request->description;
                if($request->todoFile):
                    $todo->todo_file = $this->upload->upload('todo',$todo->todo_file,$request->todoFile);
                endif;
                $todo->save();
                return true;
            }
            catch (\Exception $e) {
                return false;
            }
        }


        public function delete($id){
            $todo               = Todo::find($id);
            if($todo && $todo->upload && File::exists(public_path($todo->upload->original))):
                unlink(public_path($todo->upload->original));
                Upload::destroy($todo->upload->id);
            endif;
            return Todo::destroy($id);
        }

        public function statusUpdate($id){
            try {
                $todo                = Todo::find($id);
                if($todo->status     == TodoStatus::PENDING):
                    $todo->status    = TodoStatus::PROCESSING;
                elseif($todo->status == TodoStatus::PROCESSING):
                    $todo->status    = TodoStatus::COMPLETED;
                endif;
                $todo->save();

                return true;

            } catch (\Throwable $th) {

                return false;
            }
        }
}
