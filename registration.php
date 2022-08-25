<?php
session_start();
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';
if(!empty($sessData['status']['msg'])){
    $statusMsg = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style2.css" type="text/css" media="all" />
	<meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>
<body>
	<div class="container">
		<h2>Crear una Nueva Cuenta</h2>
		<?php echo !empty($statusMsg)?'<p class="'.$statusMsgType.'">'.$statusMsg.'</p>':''; ?>
		<div class="regisFrm">
			<form action="userAccount.php" method="post">
				<input type="text" name="first_name" placeholder="Nombre" required="">
				<input type="text" name="last_name" placeholder="Apellido" required="">
				<input type="email" name="email" placeholder="Correo Electrónico" required="">
				<input type="text" name="phone" placeholder="Número Telefónico" required="">
				<input type="password" name="password" placeholder="Contraseña" required="">
				<input type="password" name="confirm_password" placeholder="Confirma tu Contraseña" required="">
				<div class="send-button">
					<input type="submit" name="signupSubmit" value="Crear Cuenta">
				</div>
			</form>
		</div>
	</div>
</body>
</html>