<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Image;
use App\Models\Video;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=1; $i < 11; $i++) {
            $article = Article::find($i);

            for ($j=0; $j < 5; $j++) {
                $article->comments()->create([
                    'user_id' => rand(1,10),
                    'content' =>fake()->text()
                ]);
            }
        }

        for ($i=1; $i < 11; $i++) {
            $article = Image::find($i);

            for ($j=0; $j < 5; $j++) {
                $article->comments()->create([
                    'user_id' => rand(1,10),
                    'content' =>fake()->text()
                ]);
            }
        }

        for ($i=1; $i < 11; $i++) {
            $article = Video::find($i);

            for ($j=0; $j < 5; $j++) {
                $article->comments()->create([
                    'user_id' => rand(1,10),
                    'content' =>fake()->text()
                ]);
            }
        }

    }
}
