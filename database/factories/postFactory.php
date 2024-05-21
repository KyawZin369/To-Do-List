<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class postFactory extends Factory
{
    public function definition(): array
    {
        return [
            'post_title' => $this -> faker -> sentence(8),
            'post_desc'  => $this -> faker -> text(1000)
        ];
    }
}
