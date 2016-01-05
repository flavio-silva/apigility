angular.module("starter.controllers").controller('loginCtrl', function ($scope, $http, config, $state, OAuth, OAuthToken) {
	$scope.login = function (login) {

		OAuth.getAccessToken(login).then(function () {
			$state.go('tabs.orders');

		}, function () {
			$scope.errorLogin = "Usuário e / ou senha inválido(s)";
		});
	};
});