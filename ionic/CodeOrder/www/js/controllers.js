angular.module("starter.controllers", []);

angular.module("starter.controllers").controller('LoginCtrl', function ($scope, $http, config) {
	$scope.login = function () {
		dataPost = {
			grant_type: 'password',
			client_id: 'testclient',
			username: 'flavio',
			password: 'test',
			client_secret: 'testpass'
		};

		$http.post(config.baseUrl + '/oauth', dataPost).success(function (data) {
			console.log(data.access_token);
		});
	}
});