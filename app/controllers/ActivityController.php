<?php

class ActivityController extends BaseController {

  public function index() {
    return Activity::orderBy('date', 'DESC')->get();
  }

  public function create() {
    $activity = Activity::create([
      'title' => Input::get('title'),
      'author' => Input::get('author'),
      'amount' => Input::get('amount'),
      'date' => Input::get('date'),
      'category' =>Input::get('category'),
    ]);

    $activity->save();

    return $activity;
  }

  public function delete($id) {
    $activity = Activity::find($id);

    $activity->delete();

    return $activity;
  }

}
