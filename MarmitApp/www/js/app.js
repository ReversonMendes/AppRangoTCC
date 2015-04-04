// Ionic iniciantes App

// Angular.module é um lugar global para criar, registrar e recuperar módulos angulares
// 'Arranque' é o nome deste exemplo módulo angular (também definido em um <body> em atributo index.html)
// O segundo parâmetro é um array de "exige"
// 'Starter.services' é encontrado em services.js
// 'Starter.controllers' é encontrado em controllers.js
angular.module('starter', ['ionic', 'starter.controllers', 'starter.services'])

.run(function($ionicPlatform) {
  $ionicPlatform.ready(function() {
    // Ocultar o bar acessório por padrão (remover este para mostrar a barra de acessórios acima do teclado
    // Para entradas de formulário)
    if (window.cordova && window.cordova.plugins.Keyboard) {
      cordova.plugins.Keyboard.hideKeyboardAccessoryBar(true);
    }
    if (window.StatusBar) {
      // org.apache.cordova.statusbar required
      StatusBar.styleDefault();
    }
  });
})

.config(function($stateProvider, $urlRouterProvider) {

    // Ionic utiliza AngularUI Router que utiliza o conceito de estados
   // Saiba mais aqui: https://github.com/angular-ui/ui-router
   // Configure os vários estados que o app pode estar.
   // Controlador de cada estado podem ser encontrados em controllers.js
  $stateProvider

  // configuração de um estado abstrato para a directiva tabs
    .state('tab', {
    url: "/tab",
    abstract: true,
    templateUrl: "templates/tabs.html"
  })

  //Cada guia tem sua própria pilha de histórico de navegação:

  .state('tab.dash', {
    url: '/dash',
    views: {
      'tab-dash': {
        templateUrl: 'templates/tab-dash.html',
        controller: 'DashCtrl'
      }
    }
  })

  .state('tab.chats', {
      url: '/chats',
      views: {
        'tab-chats': {
          templateUrl: 'templates/tab-chats.html',
          controller: 'ChatsCtrl'
        }
      }
    })
    .state('tab.chat-detail', {
      url: '/chats/:chatId',
      views: {
        'tab-chats': {
          templateUrl: 'templates/chat-detail.html',
          controller: 'ChatDetailCtrl'
        }
      }
    })

  .state('tab.friends', {
      url: '/friends',
      views: {
        'tab-friends': {
          templateUrl: 'templates/tab-friends.html',
          controller: 'FriendsCtrl'
        }
      }
    })
    .state('tab.friend-detail', {
      url: '/friend/:friendId',
      views: {
        'tab-friends': {
          templateUrl: 'templates/friend-detail.html',
          controller: 'FriendDetailCtrl'
        }
      }
    })

  .state('tab.account', {
    url: '/account',
    views: {
      'tab-account': {
        templateUrl: 'templates/tab-account.html',
        controller: 'AccountCtrl'
      }
    }
  });

  //se nenhum dos estados acima são correspondidos, use isso como o fallback
  $urlRouterProvider.otherwise('/tab/dash');

});
