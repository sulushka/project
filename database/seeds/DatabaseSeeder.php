<?php

use Illuminate\Database\Seeder;
use App\User;
use App\News;
use App\Task;
use App\Group;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
    //     $faker = Faker::create();
    //     User::create([
    //         'name' => 'Admin',
    //         'email' => 'admin@gmail.com',
    //         'group_id' => null,
    //         'password' => bcrypt('1q2w3e4r'),
    //         'is_admin' => true,
    //     ]);
    //    for($i = 1; $i <= 10; $i++) {
    //         User::create([
    //             'name' => $faker->name,
    //             'email' => $faker->email,
    //             'group_id' => rand(1,4),
    //             'password' => bcrypt('1q2w3e4r'),
    //             'is_admin' => false,
    //         ]);
    //     }

    //     for( $i=1 ; $i <= 20; $i++) {
    //         News::create([
    //         'title' => $faker->sentence(6, true),
    //         'description' => $faker->text,
    //         'author_id' => rand(1,2)
    //         ]);
    //     }

    //     for( $i=1 ; $i <= 20; $i++) {
    //         Task::create([
    //         'title' => $faker->sentence(6, true),
    //         'description' => $faker->text,
    //         'group_id' => rand(1,4),
    //         'author_id' => rand(1,2)
    //         ]);
    //     }
    //     for( $i=7 ; $i <= 12; $i++) {
    //         Group::create([
    //         'title' => $i,
    //         ]);
    //     }
    }
}

