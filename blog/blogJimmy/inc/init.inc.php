<?php
//connection à la base de données (BDD)
$pdoBlog = new PDO(
        'mysql:host=localhost;
        dbname=blog', 
        'root',
        '',
        array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        )
    );

//1fonction de debug (évite de répéter toute la fonction à chaque fois que l'on veut faire un test)


function debug($mavar){
    echo '<pre class="alert alert-warning">';
    var_dump($mavar);
    echo '</pre>';
}


?>