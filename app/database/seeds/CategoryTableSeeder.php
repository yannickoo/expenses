<?php

class CategoryTableSeeder extends Seeder {

  public function run() {
    $this->command->info('Truncating "categories" table...');
    Category::truncate();

    $categories = [
      'Food',
      'Drugs',
      'Other',
    ];

    foreach ($categories as $category) {
      Category::create(array(
        'title' => $category,
      ));
    }
  }
}
