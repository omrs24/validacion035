<?php
    include_once('db.php');

    if (isset($_POST["crearsucursal"],$_POST["ddlcompaniasucursal"])) 
    {
        $sucursal = $_POST['crearsucursal'];
        $company = $_POST["ddlcompaniasucursal"];
        
        $myquery = "INSERT INTO valid035_offices (ID,company,name) VALUES (null,'$company','$sucursal')";
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