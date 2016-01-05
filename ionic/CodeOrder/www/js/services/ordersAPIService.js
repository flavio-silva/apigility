angular.module("starter").factory("ordersAPI", function ($http, config) {
	var _deleteOrder = function (id) {
		return $http.delete(config.baseUrl + '/orders/' + id);
	};

	var _getOrders = function () {
		return $http.get(config.baseUrl + '/orders');
	};

	return {
		deleteOrder: _deleteOrder,
		getOrders: _getOrders
	};
});