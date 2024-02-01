<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title(20),
            'content' => $this->faker->text,
            'category_id' => Category::get()->random()->id,
            'preview_image' => $this->faker->image(),
            'main_image' => $this->faker->image(),

        ];
    }
}
