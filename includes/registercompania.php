<?php
    include_once('db.php');

    if (isset($_POST['crearcompania'])) 
    {
        $compania = $_POST['crearcompania'];
        
        $myquery = "INSERT INTO valid035_companies (ID,nombre) VALUES (null,'$compania')";
        
        $retval = $db->query($myquery);
        if(! $retval )
        {
            echo ($db->errorInfo());
            die();
        }
        header("Location: ../admin/dashboard.php?error=successcompania");
    }
    else{
        header("Location: ../admin/dashboard.php?error=notsetcompania");
    }
?>