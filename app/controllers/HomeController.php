<?php

class HomeController extends BaseController {

  public function start() {
    return View::make('home');
  }

}
