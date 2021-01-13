<?php 
include("../models/User.php");
$id = $_POST['id'];

if (deletar($id)) {
  echo json_encode((true));
}else{
  echo json_encode((false));
}



?>