<?php
session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'openCon.php';
require_once 'passwordHash.php';


$data = file_get_contents("php://input");

$dt = json_decode($data);
$parm = json_decode($dt->params);

$resp = array();

$query = sprintf("SELECT C.*,M.* FROM company C INNER JOIN menutype M ON C.id = M.company"
        . " WHERE C.email = '%s'",$parm->userName);

$result = mysql_query($query);
if($result){
    $row = mysql_fetch_array($result);
    if($row== ''){
        $resp['erro']=1;
        $resp['msg'] ='Este email não está registado!';
    } else {
        if(passwordHash::check_password($row['password'],$parm->pwd)){
            //iniciar o registo de SESSION
            $_SESSION['valid_ID'] = true;
            $resp['company'] = json_encode($row);
            $resp['erro'] = 0;
        } else {
            $resp['erro'] = 2;
            $resp['msg'] = 'A senha não está correcta!';
        }
    }
    echo json_encode($resp);
} else {
    echo $query;
}