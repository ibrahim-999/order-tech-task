<?php

namespace App\Http\Services;

use App\Http\Repositories\ImportRepositories;

class ImportServices
{
    public function getDataFromFile($path){
        $menuItems = file_get_contents($path);
        return  json_decode($menuItems, true);
    }
    public function uploadFile($path, $file): string
    {
        $name = time().'.'.$file->getClientOriginalExtension();
        $destinationPath = $path;
        $file->move($destinationPath, $name);
        return $destinationPath .'/'. $name;
    }
    public function uploadFileData($path, $file): void
    {
        $destinationPath = $this->uploadFile($path, $file);
        $menuItems = $this->getDataFromFile($destinationPath);
        (new ImportRepositories())->import($menuItems);
    }
}
