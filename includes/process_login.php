<?php
include_once 'db.php';

session_start();
 
    
    if(isset($_POST['username']))
    {
        $username = strtolower($_POST["username"]);   
    }
    else
    {
        $username = strtolower($_REQUEST["correo"]);
    }
    //$password = $_POST["password"];
    
	$query = "SELECT ID, correo, password, nombre, apellido, admin, sadmin, compania, activo FROM valid035_users WHERE correo = '$username'";
	$result = $db->query($query);
	
	if ($row = $result->fetch()) {
	    $correo = $row["correo"];
		$active = $row["activo"];
		$admin = $row["admin"];
		
		if ($active != "Y") 
		{
			header('Location: ../login.php?error=noactive');
		} else {
		    
			if ($correo == $username) 
			{
				// Login success
				$_SESSION["authenticated_user"] = true;
				$_SESSION["timeout"] = time();
				$_SESSION["ID"] = $row["ID"];
				$_SESSION["correo"] = $row["correo"];
				$_SESSION["nombrecorto"] = $row["nombre"];
				$_SESSION["nombrefull"] = $row["nombre"]." ".$row["apellido"];
				$_SESSION["role"] = $admin;
				$_SESSION["sadmin"] = $row["sadmin"];
				$_SESSION["compania"] = $row["compania"];
				
				if($admin != 1)
				{
					header('Location: ../demo.php');
				}
				else
				{
					header('Location: ../admin/dashboard.php');
				}
			} else {
				// Login failed
				header('Location: ../login.php?error=badlogin');
			}
		}
	} else {
		header('Location: ../login.php?error=nosuchuser');
	}
?>