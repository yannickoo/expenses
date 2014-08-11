var app = angular.module('expenses', ['userService', 'authorService', 'categoryService', 'activityService']);

app.filter('author', function() {
  return function(input, authors) {
    if (!authors) {
      return input;
    }

    return authors.filter(function(v) {
      return v.id == input;
    })[0].first_name;
  };
});

app.filter('category', function() {
  return function(input, categories) {
    if (!categories) {
      return input;
    }

    return categories.filter(function(v) {
      return v.id == input;
    })[0].title;
  };
});

app.controller('activitiesController', function($scope, $rootScope, $filter, User, Author, Category, Activity) {
  $scope.loggedIn = User.isLoggedIn();
  $scope.loading = 3;
  $scope.activitiesLoading = true;

  $rootScope.$watch('loggedIn', function(newValue) {
    $scope.loggedIn = !!newValue;

    if (newValue) {
      Author.get().success(function(data) {
        $scope.authors = data;
        $scope.activity.author = data[0].id;
        $scope.loading--;
      });

      Category.get().success(function(data) {
        $scope.categories = data;
        $scope.activity.category = data[0].id;
        $scope.loading--;
      });

      Activity.get().success(function(data) {
        $scope.activities = data;
        $scope.loading--;
        $scope.activitiesLoading = false;
      });
    }
  });

  $scope.activity = {
    date: new Date().toISOString().slice(0, 10),
  };

  $scope.total = function(activities) {
    var total = 0;

    if (!activities) {
      return '';
    }

    for (var i = 0, j = activities.length; i < j; i++) {
      total += parseFloat(activities[i].amount);
    }

    return $filter('currency')(total, '€');
  };

  $scope.addActivity = function() {
    $scope.activitiesLoading = true;

    Activity.save($scope.activity).success(function(data) {
      Activity.get().success(function(activities) {
        $scope.activities = activities;
        $scope.activitiesLoading = false;
      })
    });

    $scope.activity = {
      author: $scope.authors[0].id,
      date: new Date().toISOString().slice(0, 10),
      category: $scope.categories[0].id
    };
  };

  $scope.deleteActivity = function(id) {
    if (!confirm('Do you really want to delete this expenses?')) {
      return;
    }

    $scope.activitiesLoading = true;

    Activity.destroy(id).success(function(data) {
      Activity.get().success(function(activities) {
        $scope.activities = activities;
        $scope.activitiesLoading = false;
      })
    });
  };
});

app.controller('usersController', function($scope, $rootScope, User) {
  $scope.loggedIn = User.isLoggedIn();
  $scope.user = {};

  $rootScope.$watch('loggedIn', function(newValue) {
    $scope.loggedIn = newValue;
  });

  $scope.login = function() {
    User.login($scope.user, function(data) {
      $scope.user = {};
      User.loggedIn
    });
  };

  $scope.logout = function() {
    User.logout();
  };
});


