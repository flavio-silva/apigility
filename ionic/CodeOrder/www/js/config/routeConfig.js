angular.module("starter").config(function($stateProvider, $urlRouterProvider) {
    $stateProvider.state('tabs', {
        url: '/t',
        abstract: true,
        templateUrl: 'templates/tabs.html'
    });

    $stateProvider.state('tabs.orders', {
        url: '/orders',
        views: {
            'orders-tab': {
                templateUrl: 'templates/orders.html',
                controller: "ordersCtrl"
            }
        }
    });

    $stateProvider.state('tabs.create', {
        url: '/create',
        views: {
            'create-tab': {
                templateUrl: 'templates/create.html'
            }
        }
    });

    $stateProvider.state('login', {
        url: '/login',
        templateUrl: 'templates/login.html',
        controller: 'loginCtrl'
    });

    $stateProvider.state('tabs.show', {
        url: '/orders/:id',
        views: {
            'orders-tab': {
                templateUrl: 'templates/orders-show.html',
                controller: "orderCtrl"
            }
        }
    });

    $urlRouterProvider.otherwise('/login');
})