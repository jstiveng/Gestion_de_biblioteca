<?php
require_once("dbConfig.php");
session_start();

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) 
{
$contra = $_POST['cont'];

if ($_POST['cont']== "" || $_POST['conta']== "" )
	{
                 echo '<script>alert (" Datos Vacios no ingreso la Clave");</script>';
                 echo '<script>window.location="resetPassword.php"</script>';
	}
	else
	{
    
        $doc = $_SESSION['email'];
        $contra= md5($contra);
        $insertSQL = "UPDATE users SET password ='$contra'  WHERE email = '$doc'";
        mysqli_query($mysqli, $insertSQL) or die();  	
             echo '<script>alert (" Cambio de Clave Existosa ");</script>';
            echo '<script>window.location="index.php"</script>';
    
    }
   
}
?>
<?php
if($_POST["inicio"])
{
	$doc = $_POST["email"];
	$sql="select * from users where email = '$doc'"; 	
	$query=mysqli_query($mysqli, $sql);
	$fila=mysqli_fetch_assoc($query);
	
	if($fila)
    {		
        $_SESSION['email']=$fila['email'];
    
 ?>


        <html>
            <head>
                <link rel="stylesheet" href="style2.css">
                <meta charset="utf-8">
            </head>
            <body>
        <div class="container">
		<div class="regisFrm">
                <form autocomplete="off" method="post">
				<input type="text" name="cont" placeholder="Contraseña" id="cont" required="">
				<input type="text" name="conta" placeholder="Repite contraseña" id="conta" required="">
				<div class="send-button">
					<input type="submit" name="inicio" value="Cambiar">
                    <input type="hidden" name="MM_update" value="form1" />

                        </form>
            </body>
        </html>

        <?php
    }  
   else
    {
    echo '<script>alert (" El documento no exite en la Base de Datos");</script>';
    echo '<script>window.location="forgotPassword.php"</script>';
    }
}