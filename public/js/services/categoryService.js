var app = angular.module('categoryService', [])

app.factory('Category', function($http) {
  return {
    get: function() {
      return $http.get('api/categories');
    }
  }
});
