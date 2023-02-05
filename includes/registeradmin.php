<?php
    include_once('db.php');

    if (isset($_POST["nombre-admin"], $_POST["apellido-paterno-admin"],$_POST["correo-admin"],$_POST['rfcocurp-admin'],$_POST['ddlcompaniaadmin'],$_POST['ddlsucursaladmin'])) 
    {
        $nombre = $_POST['nombre-admin'];
        $apellido = $_POST['apellido-paterno-admin']. " " . $_POST['apellido-materno-admin'];
        $correo = $_POST['correo-admin'];
        $password = $_POST['password-admin'];
        $rfcocurp = $_POST['rfcocurp-admin'];
        $compania = $_POST['ddlcompaniaadmin'];
        $sucursal = $_POST['ddlsucursaladmin'];
        if(isset($_POST["sadmin"])) {
            $superadmin = 'TRUE';
        } else {
            $superadmin = 'FALSE';
        }
        
        $myquery = "INSERT INTO valid035_users (ID,correo,RFCURP,compania,sucursal,nombre,apellido,admin,activo) VALUES (null,'$correo','$rfcocurp','$compania','$sucursal',$nombre','$apellido',TRUE,$superadmin,'Y')";
        //echo $myquery;
        $retval = $db->query($myquery);
        if(! $retval )
        {
            echo ($db->errorInfo());
            die();
        }
        header("Location: ../admin/dashboard.php?error=success");
    }
    else{
        header("Location: ../admin/dashboard.php?error=notset");
    }
?>