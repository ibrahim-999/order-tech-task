<?php

namespace App\Http\Repositories;

use App\Models\MenuItem;
use App\Models\MenuItemOption;

class ImportRepositories
{

    public function import($menuItems)
    {
        foreach ($menuItems['MenuItems'] as $menuItemData) {
            $menuItem = MenuItem::create([
                'data' => json_encode($menuItemData, true),
                'item_name' => $menuItemData['ItemName'],
                'item_description' => $menuItemData['ItemDescription'],
                'price' => $menuItemData['Price'],
            ]);
            if (isset($menuItemData['ItemOptions'])) {
                foreach ($menuItemData['ItemOptions'] as $menuItemOptionData) {
                    MenuItemOption::create([
                        'name' => $menuItemOptionData['Name'],
                        'max_qty' => $menuItemOptionData['MaxQty'],
                        'price' => $menuItemOptionData['Price'],
                        'menu_item_id' => $menuItem->id,
                    ]);
                }
            }
        }
    }

}
