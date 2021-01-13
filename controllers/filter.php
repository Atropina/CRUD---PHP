<?php

include("../models/User.php");
$nome = $_POST['nomeP'];
$estado = $_POST['estadoP'];
$cidade = $_POST['cidadeP'];

$data = getByFilter($nome, $estado, $cidade);


if ($data != null) {
  
  echo json_encode($data);
} else {
  echo json_encode(false);
}
