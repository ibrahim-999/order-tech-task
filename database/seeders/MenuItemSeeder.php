<?php

namespace Database\Seeders;

use App\Models\MenuItem;
use App\Models\MenuItemOption;
use Database\Factories\MenuItemFactory;
use Illuminate\Database\Seeder;

class MenuItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MenuItem::factory()
            ->count(5)
            ->has(MenuItemOption::factory()->count(5))
            ->create();
    }
}
