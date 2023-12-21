<?php

namespace App\Http\Services;

use App\Models\MenuItem;

class MenuService
{
    public function getAllMenuItems()
    {
        return MenuItem::all();
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