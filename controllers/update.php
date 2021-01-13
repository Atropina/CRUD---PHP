<?php 
 include("../models/User.php");
 $id = $_POST['idU'];
 $nome = $_POST['nomeU'];
 $estado = $_POST['estadoU'];
 $cidade = $_POST['cidadeU'];

if (update($id,$nome,$estado,$cidade)) {
  echo json_encode(true);
}else{
  echo json_encode(false);
}

?>