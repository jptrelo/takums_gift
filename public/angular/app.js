var app = angular.module('app', [
   'ngStorage'
])
    .constant('API_URL','http://localhost:8080/api/')
    .config(['$httpProvider', function ($httpProvider) {
    	$httpProvider.interceptors.push(['$q', '$location', '$localStorage', function ($q, $location, $localStorage) {
		   return {
		       'request': function (config) {
		           config.headers = config.headers || {};
		           if ($localStorage.token) {
		               config.headers.Authorization = 'Bearer ' + $localStorage.token;
		           }
		           return config;
		       },
		       'responseError': function (response) {
		           if (response.status === 401 || response.status === 403) {
		               $location.path('/');
		           }
		           return $q.reject(response);
		       }
		   };
		}]);
	}]);