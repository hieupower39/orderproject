<?php
  session_start();
  if($_REQUEST != null){
    include "./Core/request.php";
    return;
  } 
  
  include "home/home.php";

?>
