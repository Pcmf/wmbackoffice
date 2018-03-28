/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

angular.module('WMbackoffice').controller('wellcomeController',function($scope,$rootScope,$http){
    //FAKE LOGIN
  //  sessionStorage.company = JSON.stringify({"name":"BarM","cid":"11","business":"1","qrhash":"$2a$10$ec9fac498a5d8a515bb58uTt2bt.Tr43T573n5WOAErHtsxJr6Atq"});
    

    
    $rootScope.company = JSON.parse(sessionStorage.company);
    
    //Tenta obter o menutype
    $http({
        url:'php/getMainMenu.php',
        method:'POST',
        data:{param:JSON.stringify($rootScope.company)}
    }).then(function(resp){
        sessionStorage.langs = $rootScope.company.langs;
        sessionStorage.type = $rootScope.company.type;
    });
    
});
