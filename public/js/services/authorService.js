var app = angular.module('authorService', [])

app.factory('Author', function($http) {
  return {
    get: function() {
      return $http.get('api/authors');
    }
  }
});
