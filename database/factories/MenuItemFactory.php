<?php

namespace Database\Factories;

use App\Models\MenuItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class MenuItemFactory extends Factory
{
    protected $model = MenuItem::class;

    public function definition()
    {
        return [
            'item_name' => $this->faker->word,
            'item_description' => $this->faker->sentence,
            'price' => $this->faker->randomFloat(2, 1, 100),
        ];
    }
}
