<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->realText(100);

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'body' => $this->faker->realText(500),
            'image' => 'https://markateur.com/wp-content/uploads/2017/04/articles.jpg',
            'created_at' => $this->getRandomDate(1609448400, 1633121999),
        ];
    }

    protected function getRandomDate($start, $end)
    {
        $rand = mt_rand($start, $end);
        $date = date('Y-m-d H:i:s', $rand);

        return $date;
    }
}
