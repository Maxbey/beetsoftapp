export function RoutesConfig($stateProvider, $urlRouterProvider, $locationProvider) {
	'ngInject';

	let getView = (viewName) => {
		return `./views/app/pages/${viewName}/${viewName}.page.html`;
	};

    $locationProvider.html5Mode(true);

	$urlRouterProvider.otherwise('/');

	$stateProvider
		.state('app', {
			abstract: true,
            data: {},//{auth: true} would require JWT auth
			views: {
				header: {
					templateUrl: getView('header')
				},
				main: {}
			}
		})
		.state('app.landing', {
            url: '/',
            data: {auth: true},
            views: {
                'main@': {
                    templateUrl: getView('landing')
                }
            }
        })
        .state('app.login', {
			url: '/login',
			views: {
				'main@': {
					templateUrl: getView('login')
				}
			}
		})
        .state('app.register', {
            url: '/register',
            views: {
                'main@': {
                    templateUrl: getView('register')
                }
            }
        })
        .state('app.upload_page', {
            url: '/upload',
            data: {auth: true},
            views: {
                'main@': {
                    templateUrl: getView('upload-page')
                }
            }
        })
        .state('app.dashboard_page', {
            url: '/dashboard',
            data: {auth: true},
            views: {
                'main@': {
                    templateUrl: getView('dashboard-page')
                }
            }
        })
        .state('app.file_page', {
            url: '/files/:link',
            views: {
                'main@': {
                    templateUrl: getView('file-page')
                }
            }
        });
}
