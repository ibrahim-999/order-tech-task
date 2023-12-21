<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\ApiController;
use App\Http\Services\ImportServices;
use App\Http\Services\MenuService;
use Illuminate\Http\Request;

class MenuItemController extends ApiController
{
    protected $importService;
    protected $menuService;

    public function __construct(
        ImportServices $importService,
        MenuService $menuService
    )
    {
        $this->importService = $importService;
        $this->menuService = $menuService;
    }

    public function upload(Request $request): array
    {
        $file = $request->menu_items;
        $path = public_path('/files');
        $this->importService->uploadFileData($path, $file);

        return $this->successCreateMessage('File has been uploaded successfully');
    }
}
