<?
  include_once ($_SERVER['DOCUMENT_ROOT']."/templates/imports.php");
  if(isset($_SESSION['user'])){
    header("Location: ./myPlanets.php");
	}
	$title = "Registro";
  include_once($_SERVER["DOCUMENT_ROOT"]."/templates/header.php");
  $util = new Utilities();
?>
<div id="div_form" class="form form-register">
  <form action="controllers/createUser.php" method="post" onsubmit="return validatesRegister();" id="form">
    <div id="div_datos_personales">
      <fieldset>
        <legend>Registro</legend>
				<div class="fields">
					<div id="div_login">
						<label id="label_login" for="login">Login</label><br/>
						<input id="login" class="input_big" name="login" type="text" value="<?=$util->formValue('login')?>" tabindex="1" />
					</div>

					<div id="div_password">  
						<label id="label_password" for="password">Password</label><br/>
						<input id="password" name="password" type="password" tabindex="2" />
					</div>

					<div id="div_repassword">  
						<label id="label_repassword" for="repassword">Re-Password</label><br/>
						<input id="repassword" name="repassword" type="password" tabindex="3" />
					</div>

					<div id="div_email">  
						<label id="label_email" for="email">Email</label><br/>
						<input id="email" name="email" type="text" value="<?=$util->formValue('email')?>" tabindex="4" />
					</div>
				</div>
      </fieldset>
    </div>
    <div id="div_submit">
      <input type="submit" value="¡Regístrate!" tabindex="5" />
    </div>
  </form>
</div>

<? include_once ($_SERVER["DOCUMENT_ROOT"]."/templates/footer.php"); ?>
