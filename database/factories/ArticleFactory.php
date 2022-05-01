<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            
            "id_api"      => $this->faker->randomNumber(),
            "title"       => $this->faker->text(100),
            "url"         => $this->faker->url(),
            "imageUrl"    => $this->faker->imageUrl(),
            "newsSite"    => $this->faker->text(20),
            "summary"     => 0,
            "publishedAt" => $this->faker->dateTime(),
            "updatedAt"   => $this->faker->dateTime(),
            "featured"    => 0
        ];
    }
}
