<?php

namespace Database\Factories;

use App\Models\MenuGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

class MenuGroupFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MenuGroup::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'name' => $this->faker->word(2),
            'icon' => $this->faker->randomElement(['fas fa-home', 'fas fa-user', 'fas fa-cog']),
        ];
    }
}
