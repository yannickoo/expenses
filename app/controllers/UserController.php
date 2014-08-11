<?php

class UserController extends BaseController {

  public function index() {
    return User::all();
  }

  public function check() {
    return Response::json(Auth::check());
  }

  public function login() {
    $data = [
      'username' => Input::get('name'),
      'password' => Input::get('password'),
    ];

    if (Auth::attempt($data, TRUE)) {
      return Auth::user();
    }
  }

  public function logout() {
    Auth::logout();
  }

}
