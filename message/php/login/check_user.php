<?php
  require_once('../config.php');
  $sql="SELECT 1 from user where username='".$_POST['name']."' AND password='".$_POST['pass']."'";
  $result=mysql_query($sql);
  echo mysql_num_rows($result);
?>
