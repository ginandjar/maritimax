<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      //
      $faker = \Faker\Factory::create();

      $price=250000;
      $now='';

      for ($i = 0; $i < 3; $i++) {
          User::create([
            'name' => $faker->name,
            'email' => $faker->safeEmail,
            'reset_attempt' => 0,
            'password' => bcrypt('maritimax'),
          ]);
      }
    }
}
