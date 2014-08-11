<?php

class UserTableSeeder extends Seeder {

  public function run() {
    $this->command->info('Truncating "users" table...');
    User::truncate();

    User::create(array(
      'username' => 'admin',
      'first_name' => 'Joe',
      'email' => 'joe.doe@example.com',
      'password' => Hash::make('admin'),
      'admin' => 1,
    ));

    User::create(array(
      'username' => 'hannah',
      'first_name' => 'Hannah',
      'email' => 'hannah@example.com',
      'password' => Hash::make('hannah!'),
    ));
  }
}
