/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

angular.module('WMbackoffice').controller('typesController',function($scope,$http,$rootScope){
    $rootScope.company = JSON.parse(sessionStorage.company);
    
    $scope.selectedType = 0;
    if(sessionStorage.type != undefined){
        $scope.selectedType = sessionStorage.type;
    }
    
    $scope.selectType = function(type){
        $scope.selectedType = type;
        sessionStorage.type = type;
    };
    
    $scope.saveType = function(type){
        var parm ={};
        parm.cid = JSON.parse(sessionStorage.company).company;
        parm.type = type;
        $http({
            url:'php/saveType.php',
            method:'POST',
            data:{params:JSON.stringify(parm)}
        }).then(function(){
            window.location.replace('#/cats');
        });
    };
    
});
