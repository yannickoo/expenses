<?php

class ActicityTableSeeder extends Seeder {

  public function run() {
    $this->command->info('Truncating "activities" table...');
    Activity::truncate();

    $faker = Faker\Factory::create('de_DE');

    for ($i = 0; $i < 15; $i++) {
      $id = $i + 1;
      $title = $faker->text(30);
      $date = $faker->dateTimeThisYear();
      $amount = $faker->randomNumber(2);
      $category = Category::orderBy(DB::raw('RAND()'))->first()->id;
      $author = User::orderBy(DB::raw('RAND()'))->first()->id;

      $activity = Activity::create(array(
        'title' => $title,
        'author' => $author,
        'date' => $date,
        'amount' => $amount,
        'category' => $category,
      ));
    }
  }
}
