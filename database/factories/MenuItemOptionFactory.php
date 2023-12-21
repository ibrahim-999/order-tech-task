<?php

namespace Database\Factories;

use App\Models\MenuItemOption;
use Illuminate\Database\Eloquent\Factories\Factory;

class MenuItemOptionFactory extends Factory
{
    protected $model = MenuItemOption::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'max_qty' => $this->faker->numberBetween(1, 10),
            'price' => $this->faker->randomFloat(2, 0.5, 10),
        ];
    }
}
