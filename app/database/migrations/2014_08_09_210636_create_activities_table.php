<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('activities', function($table) {
      $table->increments('id');
      $table->string('title')->nullable();
      $table->integer('author');
      $table->date('date');
      $table->string('amount');
      $table->integer('category');
      $table->timestamps();
      $table->softDeletes();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::drop('activities');
  }

}
