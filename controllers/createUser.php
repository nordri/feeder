<?php
	include ($_SERVER['DOCUMENT_ROOT']."/lib/util.php");
  include ($_SERVER['DOCUMENT_ROOT']."/lib/sgbd.php");
  session_start();
    
  $validator = new Utilities();
  $errors = array();
  $conn = new Sgbd();
  
  $login = $_REQUEST['login'];
  $password = $validator->codificaPasswd($_REQUEST['password']);
  $email = $_REQUEST['email'];
  $fecha = date("Y-n-j H:i:s");
  
  validatesPresenceOf($login, "No se puede dejar vacío el login");
  validatesPresenceOf($_REQUEST['password'], "No se puede dejar vacía la contraseña");
  validatesPresenceOf($email, "No se puede dejar vacío el email");
  validatesUniquenessOf("users", array("login" => $login), "El usuario ya existe");
  validatesUniquenessOf("users", array("email" => $email), "El email ya existe, elije otro");
  validatesConfirmationOff($_REQUEST['password'], $_REQUEST['repassword'], "La contraseña no coincide");
  validatesEmailFormatOf($email, "Formato de email incorrecto");

  if(count($errors) == 0) {
    //Creamos el usuario
    $user_id = $conn->insert2DB("users", array("login" => $login, "password" => $password, "email" => $email, "created_at" => $fecha));
    //Creamos su perfil
    $profile_id = $conn->insert2DB("profiles", array("user_id" => $user_id));

    //Logueamos al usuario guardando en session su id
    $_SESSION['user'] = $user_id;
    $_SESSION['flash_notice'] = "Usuario creado!";
    header("Location: ../myPlanets.php");
  }else{
    //Cargamos los atributos para cargarlos en el formulario
    $_SESSION['form_values'] = $_REQUEST;
    $_SESSION['flash_error'] = implode("<br/>", $errors);
    header("Location: ../register.php");
  }
?>
