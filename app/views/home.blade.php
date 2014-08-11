@extends('layout')

@section('content')
  <div id="login" ng-controller="usersController" ng-hide="loggedIn">
    <form name="loginForm" ng-submit="login()">
      <div class="form-group">
        <label for="user-name">Username</label>
        <input type="text" id="user-name" class="form-control" ng-model="user.name" required autofocus>
      </div>
      <div class="form-group">
        <label for="user-password">Password</label>
        <input type="password" id="user-password" class="form-control" ng-model="user.password">
      </div>
      <button type="submit" class="btn btn-primary">Log in</button>
    </form>
  </div>
  <div id="activities" ng-controller="activitiesController" ng-show="loggedIn">
    <div class="well">
      <form name="activityForm" class="form-inline" ng-submit="addActivity()" novalidate>
        <select name="author" name="author" class="form-control" ng-model="activity.author" ng-options="author.id as author.first_name for author in authors" required></select>
        hat
        <div class="form-group">
          <div class="input-group">
            <input class="form-control" type="number" name="amount" min="1" step="0.5" ng-model="activity.amount" required>
            <div class="input-group-addon">€</div>
          </div>
        </div>
        am
        <input type="date" class="form-control" ng-model="activity.date" required>
        für
        <input type="text" name="title" class="form-control" ng-model="activity.title">
        <span class="hidden-xs">(</span>
        <select name="category" class="form-control" ng-model="activity.category" ng-options="category.id as category.title for category in categories" required>
        </select>
        <span class="hidden-xs">)</span>
        <button type="submit" class="btn btn-primary">spent</button>
      </form>
    </div>

    <hr>
    <div id="activities-overview">
    <input type="text" class="form-control" ng-model="query" placeholder="Aktivitäten filtern">
      <h2>@{{ filtered.length }} Expenses <span ng-show="filtered.length">– @{{ total(filtered) }}</span></h2>
    </p>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Name</th>
            <th>By</th>
            <th>Date</th>
            <th>Category</th>
            <th>Amount</th>
            <th>Operations</th>
          </tr>
        </thead>
        <tbody>
          <tr ng-repeat="activity in filtered = (activities | filter:query)">
            <td>@{{ activity.title }}</td>
            <td>@{{ activity.author | author:authors }}</td>
            <td>@{{ activity.date | date:'dd.MM.yyyy' }}</td>
            <td>@{{ activity.category | category:categories}}</td>
            <td>@{{ activity.amount | currency:'€' }}</td>
            <td><a href="#" ng-click="deleteActivity(activity.id)"><span class="label label-danger">löschen</span></a></td>
          </tr>
          <tr class="warning" ng-hide="filtered.length">
            <td colspan="6">No expenses found.</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  </div>
@stop
