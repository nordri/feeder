<? session_start(); ?>
<html>
  <head>
		<title>
			Feeder!
			<? if(isset($title)){ echo ' - ' . $title; } ?>
		</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css"  href="stylesheets/style.css" />

		<!-- no lo uso aun -->
		<script type="text/javascript" src="javascripts/validations.js"></script> 
		<!-- /no lo uso aun -->

  </head>
  <body>
    <div id="container">
			<div id="header">
				<span class="title">Feeder</span><br/>
				<span class="slogan">Feeds Reader!</span>
      </div>
      <div id="error" class="error">
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
      <div id="toolbar">
      <?
        if ($_COOKIE['login'] != "") {
          print("<a href=\"controllers/logout.php\">Cerrar sesión.</a>");
        } else {
          print("<a href=\"login.php\">Iniciar sesión.</a>");
        }
      ?>
    </div>
      <div id='content'>
