<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\Backup\BackupInterface;
use Illuminate\Http\Request;

class BackupController extends Controller
{
    protected $repo;
    public function __construct(BackupInterface $repo){
        $this->repo      = $repo;
    }
    public function index(){
        return view('backend.backup.index');
    }

    public function BackupDownload(){

        if($this->repo->backupDownload()):
            toast(__('backup_downloaded'),'success');
            return redirect()->route('backup.index');
        else:
            toast(__('error'),'error');
            return redirect()->back();
        endif;
    }
}
