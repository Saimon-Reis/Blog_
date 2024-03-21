<?php 

include_once 'config.php';


//portas sendo usada como variaveis
$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_SCHEMA, DB_PORT);


if($db->connect_error){
    echo "erros banco de dados: {$db->connect_error}";
    exit();
}


?>