<?php

/* 
 
 */
require_once 'openCon.php';

$data = file_get_contents("php://input");
$dt = json_decode($data);
$parm = json_decode($dt->params);

$query = sprintf("UPDATE menutype SET type=%s WHERE company=%s",$parm->type, $parm->cid);
$result = mysql_query($query);
if($result){
    echo 'OK';
}else{
    echo $query;
}





