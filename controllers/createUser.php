<?php
	include ($_SERVER['DOCUMENT_ROOT']."/lib/util.php");
  include ($_SERVER['DOCUMENT_ROOT']."/lib/sgbd.php");
  session_start();
    
  $util = new Utilities();
  $errors = array();
  $conn = new Sgbd();
  
  $login = $_POST['login'];
  $password = $util->codificaPasswd($_POST['password']);
  $email = $_POST['email'];
  $fecha = date("Y-n-j H:i:s");
  
  $util->validatesPresenceOf($login, "No se puede dejar vacío el login");
  $util->validatesPresenceOf($_POST['password'], "No se puede dejar vacía la contraseña");
  $util->validatesPresenceOf($email, "No se puede dejar vacío el email");
  $util->validatesUniquenessOf("users", array("login" => $login), "El usuario ya existe");
  $util->validatesUniquenessOf("users", array("email" => $email), "El email ya existe, elije otro");
  $util->validatesConfirmationOf($_POST['password'], $_POST['repassword'], "La contraseña no coincide");
  $util->validatesEmailFormatOf($email, "Formato de email incorrecto");
  $util->validatesLengthOf($_POST['password'], 8, "La constraseña debe tener al menos 8 caracteres");

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
    $_SESSION['form_values'] = $_POST;
    $_SESSION['flash_error'] = implode("<br/>", $errors);
    header("Location: ../register.php");
  }
?>
