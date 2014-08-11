var app = angular.module('userService', [])

app.factory('User', function($http, $rootScope) {
  return {
    isLoggedIn: function() {
      $http.get('api/login').success(function(data) {
        $rootScope.loggedIn = data == "true";

        return $rootScope.loggedIn;
      })

      return false;
    },

    login: function(data, callback) {
      $http({
        method: 'POST',
        url:'api/login',
        data: data,
      }).success(function(answer) {
        if (typeof answer.id !== 'undefined') {
          $rootScope.loggedIn = true;
        }

        callback(answer);
      });
    },

    logout: function(data) {
      return $http.post('api/logout').success(function() {
        $rootScope.loggedIn = false;
      });
    }
  }
});
