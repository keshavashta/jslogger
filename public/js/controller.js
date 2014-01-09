'use strict';

angular.module('app').controller('User_Login', ['$scope', '$http', function ($scope, $http) {
        $scope.email = "";
        $scope.password = "";
        $scope.showError = false;

        $scope.loginUser = function (user) {

            console.log('coming here');


        }
    }
    ]);
