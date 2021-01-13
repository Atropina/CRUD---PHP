<?php 


function add($data){
  include("../database/connect.php");

  if (empty($data["nome"] ||  $data["estado"] || $data["cidade"])) {
    return false;
  }else{
    $nome = $data["nome"];
    $estado = $data["estado"];
    $cidade = $data["cidade"];
    $sql = "INSERT INTO usuario  (`nome`, `cidade`, `estado`) VALUES ('$nome', '$cidade', '$estado')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      
      mysqli_close($conn);
      return true;
      
    }else{
      mysqli_close($conn);
      return false;
    }
  }
  

}

function getByFilter($nome, $uf, $cidade){
  include("../database/connect.php");
  if (empty($nome) && empty($uf) && empty($cidade)) {
    
    return false;
  }else{
    $sql = "SELECT * FROM usuario WHERE nome = '$nome' OR estado = '$uf' OR cidade = '$cidade'";

    $result = mysqli_fetch_all(mysqli_query($conn, $sql), MYSQLI_ASSOC);
    if($result){
      
      return $result;
    }else{
      
      return mysqli_error($conn);
    }
    

    
  }
}

function deletar($id){
  include("../database/connect.php");
  $sql = "DELETE FROM usuario WHERE id_user = '$id'";
  $result = mysqli_query($conn, $sql);

  if ($result) {
   return true;
  }else{
    return false;
  }
}

function update($id, $nome, $estado, $cidade){
  include("../database/connect.php");
  $sql = "UPDATE usuario SET nome = '$nome', estado = '$estado', cidade = '$cidade' WHERE id_user = '$id'";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_affected_rows($conn) > 0) {
    return true;
  }else{
    echo mysqli_error($conn);
    return false;
  }
}









?>