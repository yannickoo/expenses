<?php

class CategoryController extends BaseController {

  public function index() {
    return Category::all();
  }

}
