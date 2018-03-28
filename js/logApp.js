/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var logApp = angular.module('logApp',[]);

logApp.controller('loginController',function($scope,$http){

    $scope.u = {};
    $scope.erro ='';
    $scope.aviso ='';
    
   $scope.login = function(u){
       $http({
           url:'php/loginCheck.php',
           method:'POST',
           data:{params:JSON.stringify(u)}
       }).then(function(answer){
           if(answer.data.erro == 0){
               if($scope.erro == 0){
                   sessionStorage.company = answer.data.company;
               } else {
                   sessionStorage.company ='';
               }
               window.location.replace('/WMBackoffice/main.php');
           } else{
               
               $scope.aviso = answer.data.msg;
               $scope.erro = answer.data.erro;

               
           }
           
       });
   }; 
    
});
