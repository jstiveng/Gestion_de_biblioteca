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
    <title>Inicio de sesion biblioteca</title>
    <link rel="stylesheet" href="style2.css" type="text/css" media="all" />
	<meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

</head>
<body>
    
	<div class="container">
        <?php
			if(!empty($sessData['userLoggedIn']) && !empty($sessData['userID'])){
				include 'user.php';
				$user = new User();
				$conditions['where'] = array(
					'id' => $sessData['userID'],
				);
				$conditions['return_type'] = 'single';
				$userData = $user->getRows($conditions);
		?>
        <h2>Bienvenid@ <?php echo $userData['first_name']; ?>!</h2>
				<h2>Te has logeado correctamente, deseas seguir a la Biblioteca.</h2>
				<a href="biblioteca/index.html" class="">Continuar</a>
        <a href="userAccount.php?logoutSubmit=1" class="logout">Cerrar Sesión</a>
		<div class="regisFrm">
			
		</div>
        <?php }else{ ?>
		<h2 align="center">Ingresa en tu Cuenta</h2>
        <?php echo !empty($statusMsg)?'<p class="'.$statusMsgType.'">'.$statusMsg.'</p>':''; ?>
		<div class="regisFrm">
			<form action="userAccount.php" method="post">
				<input type="email" name="email" placeholder="Correo Electrónico" required="">
				<input type="password" name="password" placeholder="Contraseña" required="">
				<div class="send-button">
					<input type="submit" name="loginSubmit" value="Ingresar">
				</div>
				<br><br><a href="forgotPassword.php">¿Olvidaste tu Contraseña?</a>
			</form>
            <p>¿No tienes cuenta aún? <a href="registration.php">Regístrate acá</a></p>
		</div>
        <?php } ?>
	</div>
</body>
</html>