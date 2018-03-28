<?php
session_start();
/**
 * Pagina do login - 
 * Quando validado redireciona para o index.php 
 */
?>

<html ng-app="logApp">
    <head>
        <meta charset="UTF-8">
        <title>WM Backoffice</title>
        <link rel="shortcut icon" href="favicon.ico" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="lib/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="lib/angular.1.2.26.js" type="text/javascript"></script>
        <script src="js/logApp.js" type="text/javascript"></script>
    </head>
    <body ng-controller="loginController">
        <div class="container" style="margin-top: 2%">
            <div class="row">
                <div class="col-sm-3">&nbsp;</div>
                <div class="col-sm-6 well well-sm">
                    <img src="img/site/logo.png" class="thumbnail img-responsive" style="margin: auto;" alt="logotipo"/>
                     <br/>
                    <form  ng-submit="login(u)">
                      <div class="col-xs-12 text-center">
                      <label class="col-xs-5 text-right text-primary" for="userName">Utilizador: </label>
                      <div class="form-group col-xs-4">
                          <input ng-hide="erro==1" name="user" style="min-width:100px" type="text" class="form-control" ng-model="u.userName" placeholder="utilizador" required="required"/>
                          <input ng-show="erro==1" name="user" style="min-width:100px;border-color: red" type="text" class="form-control" ng-model="u.userName" placeholder="utilizador" required="required"/>
                      </div>
                      <div class="col-xs-3">&nbsp;</div>
                      </div>
                      <br/><br/>
                      <div class="col-xs-12">
                      <label class="col-xs-5 text-right text-primary"  for="pwd">Password:</label>
                      <div class="form-group col-xs-4">
                          <input ng-hide="erro==2" name="senha" style="min-width:100px" type="password" class="form-control" ng-model="u.pwd" placeholder="senha" required="required"/>
                          <input ng-show="erro==2"  name="senha" style="min-width:100px;border-color: red" type="password" class="form-control" ng-model="u.pwd" placeholder="senha" required="required"/>
                      </div>
                      <div class="col-xs-3">&nbsp;</div>
                      </div>
                    
                    <div class="row text-center">
                    <button type="submit" class="btn btn-success btn-lg">Entrar</button>
                    <span class="text-warning">{{aviso}}</span>
                    </div>
                    <div class="row text-center">
                        <h4 class="text-danger">{{error}}</h4>
                    </div>
                    </form>
                </div>
                <div class="col-sm-3">&nbsp;</div>
            </div>
        </div>
    </body>
</html>
