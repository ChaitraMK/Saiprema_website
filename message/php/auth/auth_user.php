<?php
  require_once('../config.php');

  $sql="SELECT previlage from user where username='".$_POST['name']."'";
  $result=mysql_query($sql);
  $row=mysql_fetch_assoc($result);
  header('Content-type: application/json');
  echo json_encode($row);


?>
