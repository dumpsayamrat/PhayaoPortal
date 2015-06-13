<?php
/**
 * Created by PhpStorm.
 * User: 56023_000
 * Date: 6/9/2015
 * Time: 13:01
 */
class PostsTableSeeder extends Seeder {


    public function run()
    {
        // Remove any existing data
        //DB::table('pages')->truncate();

        $faker = Faker\Factory::create();

        // Generate some dummy data
        for($i=0; $i<30; $i++) {
            Post::create([
                'title' => $faker->sentence(3),
                'content' => $faker->paragraph(5),
                'tags' => join(',', $faker->words(5))
            ]);
        }
    }

}