angular.module("starter").config(function (OAuthTokenProvider) {
	OAuthTokenProvider.configure({
		name: 'token',
		options: {
			secure: false
		}
	});
});