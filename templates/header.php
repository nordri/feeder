<?
  session_start();
	include ($_SERVER['DOCUMENT_ROOT']."/lib/util.php");
	include ($_SERVER['DOCUMENT_ROOT']."/lib/sgbd.php");
?>
<html>
  <head>
		<title>
			Feeder!
			<? if(isset($title)){ echo ' - ' . $title; } ?>
		</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css"  href="stylesheets/style.css" />

		<script type="text/javascript" src="javascripts/validations.js"></script> 
		<script type="text/javascript" src="javascripts/validations_lib.js"></script> 

  </head>
  <body>
    <div id="container">
			<div id="header">
				<h1><a href="/" class="button_image" id="logo">Feeder</a></h1>
	
        <div id="user-bar">
          <?
            if (isset($_SESSION['user'])) {
              print("<a href=\"myPlanets.php\">Mis planetas</a> | ");
              print("<a href=\"editProfile.php\">Mi perfil</a> | ");
              print("<a href=\"controllers/logout.php\">Cerrar sesión</a>");
            } else {
              print("<a href=\"login.php\">Iniciar sesión</a>");
            }
          ?>
        </div>
      </div>
        <div id='errors'>
      <?
				foreach(Array("error", "notice") as $type){
					if (isset($_SESSION["flash_$type"])) {
						print("<div id='flash' class='".$type."'>");
						print($_SESSION["flash_$type"]);
						print("</div>");
						$_SESSION["flash_$type"] = null;
					}
				}
      ?>
      </div>
      <div id='content'>
