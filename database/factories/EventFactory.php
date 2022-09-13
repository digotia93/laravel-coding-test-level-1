<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->name();
        return [
            'id' => Str::uuid(),
            'name' => $name,
            'slug' => Str::slug($name),
            'createdAt' => now(),
            'updatedAt' => now(),
        ];
    }
}
