<?php 
  
  include("../models/User.php");
  $nome = $_POST['nome'];
  $estado = $_POST['estado'];
  $cidade = $_POST['cidade'];
  $data = array(
    "nome" => $nome,
    "estado" => $estado,
    "cidade" => $cidade
  );
  
  
  if (add($data)) {
    echo json_encode(array('result' => true));
  }else{
    echo json_encode(array('result' => add($data)));
  }


  
  


?>