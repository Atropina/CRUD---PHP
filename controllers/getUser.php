<?php

  include('./database/connect.php');

  $sql = "SELECT * FROM  usuario";

  $usuarios = mysqli_fetch_all(mysqli_query($conn, $sql), MYSQLI_ASSOC);
  
?>