angular.module("starter").config(function (OAuthProvider) {
	OAuthProvider.configure({
		baseUrl: 'http://localhost:8888',
		clientId: 'testclient',
		clientSecret: 'testpass',
		grantPath: '/oauth',
		revokePath: '/oauth'
	});
});