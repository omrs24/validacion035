<?php

    //die(json_encode(count($_POST)));
    //die(json_encode($_POST));
    
    $preguntas = count($_POST);
    $pregunta41 = $_POST['g2p41'];
    $pregunta44 = $_POST['g2p44'];
    include_once('db.php');
    session_start();
    $empleado = $_SESSION['ID'];   
        
    if($pregunta41 == "si")
    {
        if($pregunta44 == "si")
        {
            //query para insertar la segunda guia si la pregunta 41 es si y la 44 si
            $query = "INSERT INTO valid035_test2 (ID,employee,p1,p2,p3,p4,p5,p6,p7,p8,p9,p10,p11,p12,p13,p14,p15,p16,p17,p18,p19,p20,p21,p22,p23,p24,p25,p26,p27,p28,p29,p30,p31,p32,p33,p34,p35,p36,p37,p38,p39,p40,p41,p42,p43,p44,p45,p46,p47,p48) VALUES (NULL,'$empleado'";
            foreach ($_POST as $key) 
            {
                $valor = 0;
                if($key == "siempre")
                {
                    $valor = 4;
                }
                elseif($key == "casis")
                {
                    $valor = 3;
                }
                elseif($key == "algunas")
                {
                    $valor = 2;
                }
                elseif($key == "casin")
                {
                    $valor = 1;
                }
                elseif($key == "si")
                {
                    $valor = 1;
                }
                elseif($key == "no")
                {
                    $valor = 0;
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
            //query para insertar la segunda guia si la pregunta 41 es si y la 44 no
            $query = "INSERT INTO valid035_test2 (ID,employee,p1,p2,p3,p4,p5,p6,p7,p8,p9,p10,p11,p12,p13,p14,p15,p16,p17,p18,p19,p20,p21,p22,p23,p24,p25,p26,p27,p28,p29,p30,p31,p32,p33,p34,p35,p36,p37,p38,p39,p40,p41,p42,p43,p44,p45,p46,p47,p48) VALUES (NULL,'$empleado'";
            foreach ($_POST as $key) 
            {
                $valor = 0;
                if($key == "siempre")
                {
                    $valor = 4;
                }
                elseif($key == "casis")
                {
                    $valor = 3;
                }
                elseif($key == "algunas")
                {
                    $valor = 2;
                }
                elseif($key == "casin")
                {
                    $valor = 1;
                }
                elseif($key == "si")
                {
                    $valor = 1;
                }
                elseif($key == "no")
                {
                    $valor = 0;
                }
                else
                {
                    $valor = 0;
                }
                $query .= ",$valor";
            }
            $query .= ",' ',' ',' ',' '";
        }
        
    }
    else
    {
        if($pregunta44 == "si")
        {
            //query para insertar la segunda guia si la pregunta 41 es no y la 44 si
            $query = "INSERT INTO valid035_test2 (ID,employee,p1,p2,p3,p4,p5,p6,p7,p8,p9,p10,p11,p12,p13,p14,p15,p16,p17,p18,p19,p20,p21,p22,p23,p24,p25,p26,p27,p28,p29,p30,p31,p32,p33,p34,p35,p36,p37,p38,p39,p40,p41,p42,p43,p45,p46,p47,p48) VALUES (NULL,'$empleado'";
            $indice = 0;
            foreach ($_POST as $key) 
            {
                $indice++;
                $valor = 0;
                if($key == "siempre")
                {
                    $valor = 4;
                }
                elseif($key == "casis")
                {
                    $valor = 3;
                }
                elseif($key == "algunas")
                {
                    $valor = 2;
                }
                elseif($key == "casin")
                {
                    $valor = 1;
                }
                elseif($key == "si")
                {
                    $valor = 1;
                }
                elseif($key == "no")
                {
                    $valor = 0;
                }
                elseif($indice > 41 && $indice < 44)
                {
                    $valor = "' '";
                }
                else
                {
                    $valor = 0;
                }
                $query .= ",'$valor'";
            }
        }
        else
        {
            //query para insertar la segunda guia si la pregunta 41 es no y la 44 no
            $query = "INSERT INTO valid035_test2 (ID,employee,p1,p2,p3,p4,p5,p6,p7,p8,p9,p10,p11,p12,p13,p14,p15,p16,p17,p18,p19,p20,p21,p22,p23,p24,p25,p26,p27,p28,p29,p30,p31,p32,p33,p34,p35,p36,p37,p38,p39,p40,p41,p42,p43,p45,p46,p47,p48) VALUES (NULL,'$empleado'";
            $indice = 0;
            foreach ($_POST as $key) 
            {
                $indice++;
                $valor = 0;
                if($indice == 42)
                {
                    break;
                }
                elseif($key == "siempre")
                {
                    $valor = 4;
                }
                elseif($key == "casis")
                {
                    $valor = 3;
                }
                elseif($key == "algunas")
                {
                    $valor = 2;
                }
                elseif($key == "casin")
                {
                    $valor = 1;
                }
                elseif($key == "si")
                {
                    $valor = 1;
                }
                elseif($key == "no")
                {
                    $valor = 0;
                }
                else
                {
                    $valor = 0;
                }
                $query .= ",'$valor'";
            }
            $query .= ",' ',' ',' ',' ',' ',' '";
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