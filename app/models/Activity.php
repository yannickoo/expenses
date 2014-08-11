<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Activity extends Eloquent {
  use SoftDeletingTrait;

  public $timestamps = FALSE;

  protected $fillable = array('title', 'author', 'amount', 'date', 'category');
}
