<?php

    //die(json_encode(count($_POST)));
    //die(json_encode($_POST));
    
    $preguntas = count($_POST);
    $pregunta65 = $_POST['g2p65'];
    $pregunta70 = $_POST['g2p70'];
    include_once('db.php');
    session_start();
    $empleado = $_SESSION['ID'];   
        
    if($pregunta65 == "si")
    {
        if($pregunta70 == "si")
        {
            //query para insertar la segunda guia si la pregunta 65 es si y la 70 si
            $query = "INSERT INTO valid035_test2b (ID,employee,p1,p2,p3,p4,p5,p6,p7,p8,p9,p10,p11,p12,p13,p14,p15,p16,p17,p18,p19,p20,p21,p22,p23,p24,p25,p26,p27,p28,p29,p30,p31,p32,p33,p34,p35,p36,p37,p38,p39,p40,p41,p42,p43,p44,p45,p46,p47,p48,p49,p50,p51,p52,p53,p54,p55,p56,p57,p58,p59,p60,p61,p62,p63,p64,p65,p66,p67,p68,p69,p70,p71,p72,p73,p74) VALUES (NULL,'$empleado'";
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
            $cond = 1;
        }
        else
        {
            //query para insertar la segunda guia si la pregunta 65 es si y la 70 no
            $query = "INSERT INTO valid035_test2b (ID,employee,p1,p2,p3,p4,p5,p6,p7,p8,p9,p10,p11,p12,p13,p14,p15,p16,p17,p18,p19,p20,p21,p22,p23,p24,p25,p26,p27,p28,p29,p30,p31,p32,p33,p34,p35,p36,p37,p38,p39,p40,p41,p42,p43,p44,p45,p46,p47,p48,p49,p50,p51,p52,p53,p54,p55,p56,p57,p58,p59,p60,p61,p62,p63,p64,p65,p66,p67,p68,p69,p70,p71,p72,p73,p74) VALUES (NULL,'$empleado'";
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
            $cond = 2;
        }
        
    }
    else
    {
        if($pregunta70 == "si")
        {
            //query para insertar la segunda guia si la pregunta 41 es no y la 44 si
            $query = "INSERT INTO valid035_test2b (ID,employee,p1,p2,p3,p4,p5,p6,p7,p8,p9,p10,p11,p12,p13,p14,p15,p16,p17,p18,p19,p20,p21,p22,p23,p24,p25,p26,p27,p28,p29,p30,p31,p32,p33,p34,p35,p36,p37,p38,p39,p40,p41,p42,p43,p44,p45,p46,p47,p48,p49,p50,p51,p52,p53,p54,p55,p56,p57,p58,p59,p60,p61,p62,p63,p64,p65,p66,p67,p68,p69,p70,p71,p72,p73,p74) VALUES (NULL,'$empleado'";
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
                elseif($indice > 65 && $indice < 70)
                {
                    $valor = "' '";
                }
                else
                {
                    $valor = 0;
                }
                $query .= ",'$valor'";
                $cond = 3;
            }
        }
        else
        {
            //query para insertar la segunda guia si la pregunta 65 es no y la 70 no
            $query = "INSERT INTO valid035_test2b (ID,employee,p1,p2,p3,p4,p5,p6,p7,p8,p9,p10,p11,p12,p13,p14,p15,p16,p17,p18,p19,p20,p21,p22,p23,p24,p25,p26,p27,p28,p29,p30,p31,p32,p33,p34,p35,p36,p37,p38,p39,p40,p41,p42,p43,p44,p45,p46,p47,p48,p49,p50,p51,p52,p53,p54,p55,p56,p57,p58,p59,p60,p61,p62,p63,p64,p65,p66,p67,p68,p69,p70,p71,p72,p73,p74) VALUES (NULL,'$empleado'";
            $indice = 0;
            foreach ($_POST as $key) 
            {
                $indice++;
                $valor = 0;
                if($indice == 65)
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
            $query .= ",'0','0',' ',' ',' ',' ',' ',' ',' ',' '";
            $cond = 4;
        }
    }
    
    $query .= ")"; 
    $retval = $db->query($query);

    if(!$retval)
    {
        die(json_encode('Error en: '. $query.'  '.$db->errorInfo() . $cond));
    }

    die(json_encode($query));
?>