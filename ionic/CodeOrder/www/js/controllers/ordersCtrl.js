angular.module("starter").controller("ordersCtrl", function ($scope, ordersAPI) {

	var _getOrders = function () {
		ordersAPI.getOrders().success(function (data) {
		$scope.orders = data._embedded.orders;
	});};

	$scope.doRefresh = function () {
		_getOrders();
		$scope.$broadcast('scroll.refreshComplete');

	};

	_getOrders();

	$scope.onOrderDelete = function (id) {
		ordersAPI.deleteOrder(id).success(function () {
			_getOrders();
		});
	};
});