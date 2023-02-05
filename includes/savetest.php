<?php

    //die(json_encode(count($_POST)));
    //die(json_encode($_POST));
    
    $preguntas = count($_POST);
    
    include_once('db.php');
    session_start();
    $empleado = $_SESSION['ID'];   
        
    if($preguntas > 6)
    {
        //query para insertar la primera guia
        $query = "INSERT INTO valid035_test1 (ID,employee,p1,p2,p3,p4,p5,p6,p7,p8,p9,p10,p11,p12,p13,p14,p15,p16,p17,p18,p19,p20) VALUES (NULL,'$empleado'";
        foreach ($_POST as $key) 
        {
            
            $valor = 0;
            if($key == "si")
            {
                $valor = 1;
            }
            else
            {
                $valor = 0;
            }
            $query .= ",$valor";
        }
    }
    else
    {
        //query para insertar la primera guia
        $query = "INSERT INTO valid035_test1 (ID,employee,p1,p2,p3,p4,p5,p6) VALUES (NULL,'$empleado'";
        foreach ($_POST as $key) 
        {
            
            $valor = 0;
            if($key == "si")
            {
                $valor = 1;
            }
            else
            {
                $valor = 0;
            }
            $query .= ",$valor";
        }
    }
    
    $query .= ")"; 
    $retval = $db->query($query);

    if(!$retval)
    {
        die(json_encode('Error en: '. $query.'  '.$db->errorInfo()));
    }
    die(json_encode($query));
?>