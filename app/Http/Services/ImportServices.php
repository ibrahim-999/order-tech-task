<?php

namespace App\Http\Services;

use App\Http\Repositories\ImportRepositories;

class ImportServices
{
    public function uploadFile($path,$file)
    {
        $name = time().'.'.$file->getClientOriginalExtension();
        $destinationPath = $path;
        $file->move($destinationPath, $name);
        return $destinationPath.'/'.$name;
    }
}
