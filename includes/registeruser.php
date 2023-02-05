<?php
    include_once('db.php');

    if (isset($_POST["nombre-empleado"],$_POST["correo-empleado"],$_POST['rfcocurp-empleado'],$_POST['ddlcompaniaempleado'],$_POST['ddlsucursalempleado'])) 
    {
        $nombre = $_POST['nombre-empleado'];
        $apellido = $_POST['apellidos-empleado'];
        $apellidos = $_POST['apellido-paterno-empleado' ]. ' ' . $_POST['apellido-materno-empleado' ] ;
        $correo = strtolower($_POST['correo-empleado']);
        $rfcocurp = $_POST['rfcocurp-empleado'];
        $compania = $_POST['ddlcompaniaempleado'];
        $sucursal = $_POST['ddlsucursalempleado'];
        //ID del empleado en caso de existir
        
        $empleadoID = $_POST['empleadoID'];
        
        $result = $db->query("SELECT * FROM valid035_users WHERE correo = '$correo'");
        $row = $result->fetch();
        $correo2 = $row['correo'];
        if($correo == $correo2)
        {
            header("Location: ../register.php?error=alreadyregistered");  
        }
        else
        {
            if($empleadoID == "")
            {
                //Valdiar que ya exista el usuario para actualizar o insertar
                $myquery = "INSERT INTO valid035_users (ID,correo,RFCURP,compania,sucursal,nombre,apellido,admin,activo) VALUES (null,'$correo','$rfcocurp','$compania','$sucursal','$nombre','$apellidos',FALSE,'Y')";
                $retval = $db->query($myquery);
            }
            else
            {
                $myquery = "UPDATE valid035_users SET RFCURP='$rfcocurp',compania = '$compania',sucursal = '$sucursal',nombre ='$nombre', apellido = '$apellido' WHERE ID = '$empleadoID'";
                $retval = $db->query($myquery);
            }
            
            if(! $retval )
            {
                echo ($db->errorInfo() . ' INSERT');
                die();
            }
            else{
                header("Location: process_login.php?correo=$correo");
            }
        }
        
    }
    else{
        header("Location: ../admin/dashboard.php?error=notset");
    }
?>