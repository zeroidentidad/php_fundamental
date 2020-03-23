// Inicializando App
var MODULE = 'front-app',
    API = {
        'token_name': 'APP-TOKEN', // NOMBRE DEL TOKEN DEFINIDO PARA API
        'base_url': 'http://localhost:8080/xslim-api-pedidos/public/' // URL DE API
    };

var frontApp = angular.module(MODULE, [
    'ngRoute',
    'authControllers',
    'pedidoControllers',
    'testControllers'
]);

(function(){
    if(typeof(localStorage[API.token_name]) === 'undefined'){
        localStorage[API.token_name] = '';
    }
}());