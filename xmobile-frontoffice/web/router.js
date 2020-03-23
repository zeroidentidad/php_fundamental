// Rutas
frontApp.config(['$routeProvider',
  function ($routeProvider) {
    $routeProvider.
      when('/', {
        templateUrl: 'partials/auth/login.html',
        controller: 'AuthLoginCtrl'
      }).
      when('/logout', {
        templateUrl: 'partials/empty.html',
        controller: 'AuthLogoutCtrl'
      }).
      when('/pedidos', {
        templateUrl: 'partials/pedidos/pedidos.html',
        controller: 'PedidosListadoCtrl'
      }).
      when('/pedidos/registrar', {
        templateUrl: 'partials/pedidos/registrar.html',
        controller: 'PedidosRegistrarCtrl'
      }).
      when('/pedidos/visualizar/:id', {
        templateUrl: 'partials/pedidos/visualizar.html',
        controller: 'PedidosVisualizarCtrl'
      }).
      when('/test', {
        templateUrl: 'partials/test/test.html',
        controller: 'TestCtrl'
      }).
      otherwise({
        redirectTo: '/'
      });
  }]);