<?php
	include ("include/tareas.php");
   include ("include/sgbd.php");
    
    $login = "'".$_REQUEST['login']."'";
    $password = "'".codificaPasswd($_REQUEST['password'])."'";
    $email = "'".$_REQUEST['email']."'";
    $fecha = "'".date("Y-n-j H:i:s")."'";
    
    $conn = new Sgbd();

    $res = $conn->insert2DB("users", array("login", "password", "email", "created_at"), array($login, $password, $email, $fecha));
    
    if ($res) {
    	header("Location: misplanetas.php");
    } else {
    	print "Falló la inserción";
      $vector = error_get_last();
      foreach($vector as $c=>$v)
   		echo "El vector con indice $c tiene el valor $v<br/>";
	 }

?>