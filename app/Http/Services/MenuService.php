<?php

namespace App\Http\Services;

use App\Models\MenuItem;
use Illuminate\Pagination\LengthAwarePaginator;

class MenuService
{
    public function __construct()
    {
        $this->menuItemModel = new MenuItem();
    }

    public function paginate(int $itemsPerPage,string $page_name='page'): LengthAwarePaginator
    {
        try {
            return $this->menuItemModel->paginate($itemsPerPage, ['*'], $page_name);
        } catch (\Throwable $exception) {
            throw $exception;
        }
    }
    public function getAllMenuItems()
    {
        return MenuItem::with('menuItemOptions')->paginate();
    }

    public function getMenuItemById($id)
    {
        return MenuItem::find($id);
    }

    public function deleteMenuItem($id)
    {
        $menuItem = MenuItem::find($id);

        if ($menuItem) {
            return $menuItem->delete();
        }

        return false;
    }
}
