var app = angular.module('activityService', [])

app.factory('Activity', function($http) {
  return {
    get: function() {
      return $http.get('api/activities');
    },

    save: function(data) {
      return $http.post('api/activities', data);
    },

    destroy: function(id) {
      return $http.delete('api/activities/' + id);
    }
  }

});
