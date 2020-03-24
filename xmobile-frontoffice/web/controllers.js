var authControllers = angular.module('authControllers', []),
    pedidoControllers = angular.module('pedidoControllers', []),
    testControllers = angular.module('testControllers', []);

// Auth Controller
authControllers.controller('AuthLoginCtrl', ['$scope', 'restApi', '$location', 'auth',
    function ($scope, restApi, $location, auth) {
        $scope.ingresar = function () {
            restApi.call({
                method: 'post',
                url: 'auth/autenticar',
                data: {
                    Correo: $scope.Correo,
                    Password: $scope.Password
                },
                response: function (r) {
                    if (r.response) {
                        auth.setToken(r.result);
                        $location.path('/pedidos');
                    } else {
                        alert(r.message);
                    }
                },
                error: function (r) {
                },
                validationError: function (r) {
                }
            });
        }
    }]);

authControllers.controller('AuthLogoutCtrl', ['$scope', '$http', '$location', 'auth',
    function ($scope, $http, $location, auth) {
        auth.logout();
    }]);

// Pedido Controller
pedidoControllers.controller('PedidosListadoCtrl', ['$scope', 'restApi', 'auth',
    function ($scope, restApi, auth) {
        auth.redirectIfNotExists();

        var user = auth.getUserData();

        $scope.usuario = user.Nombre;

        cargarPedidos();

        function cargarPedidos() {
            restApi.call({
                method: 'get',
                url: 'pedido/listarPorEmpleado/' + user.id,
                response: function (r) {
                    $scope.model = r;
                },
                error: function (r) {
                },
                validationError: function (r) {
                }
            });
        }
    }]);

pedidoControllers.controller('PedidosRegistrarCtrl', ['$scope', 'restApi', 'auth', '$location',
    function ($scope, restApi, auth, $location) {
        $scope.Pedido = {
            Cliente: $scope.Cliente,
            Empleado_id: auth.getUserData().id,
            Detalle: [],
            Total: 0,
        };

        cargarProductos();

        $scope.registrarPedido = function () {
            if (typeof ($scope.Cliente) === 'undefined' || $scope.Pedido.Detalle.lenght == 0) return;

            // Cliente actualizaEstado
            $scope.Pedido.Cliente = $scope.Cliente
            //console.log($scope.Pedido);
           
            //mandamos el pedido a la api
            restApi.call({
                method: 'post',
                url: 'pedido/guardar',
                data: $scope.Pedido,
                response: function (r) {
                    if (r.response) {
                        $location.path('/pedidos')
                    }
                },
                error: function (r) {
                },
                validationError: function (r) {
                    console.log(r);
                }
            });
        };

        $scope.retirarProducto = function (i) {
            $scope.Pedido.Detalle.splice(i, 1);
            calculaTotal();
        };

        $scope.agregarProducto = function () {

            if (typeof ($scope.Cantidad) === 'undefined' || typeof ($scope.Producto) === 'undefined') return;

            var productoSeleccionado = $scope.Productos.filter(function (x) {
                return x.id == $scope.Producto;
            })[0];

            // Valida si ya existe
            var indiceSiExiste = -1;
            $scope.Pedido.Detalle.forEach(function (x, i) {
                if (x.Producto_id == $scope.Producto) {
                    indiceSiExiste = i;
                    return false;
                }
            });

            var detalle = {
                Producto_id: productoSeleccionado.id,
                Cantidad: $scope.Cantidad,
                Imagen: productoSeleccionado.Imagen,
                Producto: productoSeleccionado.Nombre,
                PrecioUnitario: productoSeleccionado.Precio,
                Total: $scope.Cantidad * productoSeleccionado.Precio
            };

            if (indiceSiExiste === -1) {
                $scope.Pedido.Detalle.push(detalle);
            } else {
                $scope.Pedido.Detalle[indiceSiExiste] = detalle;
            }
            calculaTotal();
            $scope.Cantidad = '';
        };

        function calculaTotal() {
            var t = 0;
            $scope.Pedido.Detalle.forEach(function (x) {
                t += x.Total;
            });
            $scope.Pedido.Total = t;
        }

        function cargarProductos() {
            restApi.call({
                method: 'get',
                url: 'producto/todo',
                response: function (r) {
                    $scope.Productos = r;
                },
                error: function (r) {
                },
                validationError: function (r) {
                    console.log(r);
                }
            });
        }

    }]);

pedidoControllers.controller('PedidosVisualizarCtrl', ['$scope', 'restApi', '$location', '$routeParams',
    function ($scope, restApi, $location, $routeParams) {

        estados();

        function estados() {
            restApi.call({
                method: 'get',
                url: 'pedido/estados',
                response: function (r) {
                    $scope.estados = r;
                    obtener();
                },
                error: function (r) {
                },
                validationError: function (r) {
                }
            });
        }

        function obtener() {
            restApi.call({
                method: 'get',
                url: 'pedido/obtener/' + $routeParams.id,
                response: function (r) {
                    $scope.model = r;
                    $scope.Estado = r.Estado_id;
                },
                error: function (r) {
                },
                validationError: function (r) {
                }
            });

            $scope.actualizaEstado = function () {

                restApi.call({
                    method: 'put',
                    url: 'pedido/estado/' + $scope.model.id,
                    data: {
                        Estado_id: $scope.Estado
                    },
                    response: function (r) {
                        if (r.response) {
                            $location.path('pedidos');
                        }
                    },
                    error: function (r) {
                    },
                    validationError: function (r) {
                    }
                });
            }
        }

    }]);

// Test controller
testControllers.controller('TestCtrl', ['$scope', 'restApi', 'auth',
    function ($scope, restApi, auth) {

        validaEntidad();

        function validaEntidad() {
            restApi.call({
                method: 'post',
                url: 'test/valida',
                response: function (r) {
                },
                error: function (r) {
                },
                validationError: function (r) {
                    console.log(r);
                }
            });
        }

        function autentica() {
            restApi.call({
                method: 'get',
                url: 'test/auth',
                response: function (r) {
                    auth.setToken(r);
                    console.log(auth.getUserData());
                    validaAunteticacion();
                },
                error: function (r) {
                },
                validationError: function (r) {
                }
            });
        }

        function validaAunteticacion() {
            restApi.call({
                method: 'get',
                url: 'test/auth/validate',
                response: function (r) {
                    console.log(r);
                },
                error: function (r) {
                },
                validationError: function (r) {
                }
            });
        }
    }]);