<? session_start(); ?>
<html>
  <head>
    <title>Feeder!</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css"  href="estilo.css" />
    <script type="text/javascript" src="functions/validaRegistro.js"></script> <!-- no lo uso aun -->
  </head>
  <body>
    <div id="header">
      <img src="images/feeder-logo.png" alt="feeder"><br/>
      Feeder: Feeds Reader!
    </div>
    <div id="error" class="error">
      <?
        if (strlen($_SESSION['error_login']) !=0) {
          print($_SESSION['error_login']);
        }
      ?>		
    </div>
    <div id='content'>