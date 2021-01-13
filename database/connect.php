<?php

  $user = "root";
  $password = "";
  $host = "localhost";
  $database = "crudphp";

  $conn = mysqli_connect($host, $user, $password, $database);

  if ($conn) {
    //echo "Conectado com sucesso!";
   
  }else{
    die("Erro na conexão: " . mysqli_connect_error());
  }


?>