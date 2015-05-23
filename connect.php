<?php
    $connect=mysql_connect('localhost','justad_qwe','qweqwe');
    $connectdb=mysql_select_db('justad_qwe');

    if(!$connect){
        echo 'connect error';
    }

    if(!$connectdb){
        echo 'connect error';
    }
?>
