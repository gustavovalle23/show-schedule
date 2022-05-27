<?php 
    $conn = mysqli_connect('localhost','root','','prova_web');
    if (!$conn){
        echo 'Erro na conexão: '.mysqli_connect_error();
    }
?>