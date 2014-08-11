<!doctype html>
<html ng-app="expenses">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui">
    <title>Expenses</title>
    <base href="{{ URL::to('/') . '/' }}">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.21/angular.min.js"></script>
    <script src="js/services/userService.js"></script>
    <script src="js/services/authorService.js"></script>
    <script src="js/services/categoryService.js"></script>
    <script src="js/services/activityService.js"></script>
    <script src="js/app.js"></script>
  </head>
  <body>
    <div class="navbar navbar-inverse" role="navigation" ng-controller="usersController">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Expenses</a>
    </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
      </ul>
      <p class="navbar-text navbar-right"><a href="#" class="btn btn-default btn-xs" ng-click="logout()" ng-show="loggedIn">Log out</a></p>
    </div><!--/.nav-collapse -->
  </div>
</div>
<div class="container">
    @yield('content')
  </div>
  </body>
</html>
