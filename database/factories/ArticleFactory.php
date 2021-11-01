<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Spatie\Tags\Tag;

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
            'tags' => [$this->getTag()]
        ];
    }

    protected function getRandomDate($start, $end)
    {
        $rand = mt_rand($start, $end);
        $date = date('Y-m-d H:i:s', $rand);

        return $date;
    }

    protected function getTag()
    {
        $tags = ['tag1', 'tag2', 'tag3', 'tag4', 'tag5', 'tag6', 'tag7', 'tag8'];
        $rand = rand(0, 7);

        return $tags[$rand];
    }
}
