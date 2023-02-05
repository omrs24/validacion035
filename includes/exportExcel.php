<?php
    include_once ('db.php');

    date_default_timezone_set('America/Mexico_City');

    header ("Content-Disposition: attachment; filename=UsuariosRegistrados-".date("d-m-Y").".csv");
    header('Content-type: application/force-download');
    $myquery = $db->query("SELECT t1.nombre, t1.apellido,t1.correo,t1.rfcurp,t2.nombre cnombre,t3.name sucursal,t4.* FROM valid035_users t1 LEFT JOIN valid035_companies t2 ON t1.compania = t2.ID LEFT JOIN valid035_offices t3 ON t1.sucursal = t3.ID LEFT JOIN valid035_test1 t4 ON t1.ID = t4.employee WHERE t1.activo = 'Y' AND t1.admin = 0 AND t2.ID = 2 ORDER BY t1.nombre");
    $data = "Nombre,Apellido,Correo,RFC O CURP,Sucursal,".utf8_decode("Compañia").", ,Pregunta 1,Pregunta 2,Pregunta 3,Pregunta 4,Pregunta 5,Pregunta 6,Pregunta 7,Pregunta 8,Pregunta 9,Pregunta 10,Pregunta 11,Pregunta 12,Pregunta 13,Pregunta 14,Pregunta 15,Pregunta 16,Pregunta 17,Pregunta 18,Pregunta 19,Pregunta 20, , seccion 1, , ,seccion 2, , ,seccion 3, , ,seccion 4\n";

    while($row=$myquery->fetch())
    {
        $empleado = $row['employee'];
        $data.=utf8_decode($row['nombre']).",";
        $data.=utf8_decode($row['apellido']).",";
        $data.=utf8_decode($row['correo']).",";
        $data.=$row['rfcurp'].",";
        $data.=utf8_decode($row['sucursal']).",";
        $data.=utf8_decode($row['cnombre']).",";
        $data.=" ,";
        $data.=utf8_decode($row['p1']).",";
        $data.=utf8_decode($row['p2']).",";
        $data.=utf8_decode($row['p3']).",";
        $data.=utf8_decode($row['p4']).",";
        $data.=utf8_decode($row['p5']).",";
        $data.=utf8_decode($row['p6']).",";
        $data.=utf8_decode($row['p7']).",";
        $data.=utf8_decode($row['p8']).",";
        $data.=utf8_decode($row['p9']).",";
        $data.=utf8_decode($row['p10']).",";
        $data.=utf8_decode($row['p11']).",";
        $data.=utf8_decode($row['p12']).",";
        $data.=utf8_decode($row['p13']).",";
        $data.=utf8_decode($row['p14']).",";
        $data.=utf8_decode($row['p15']).",";
        $data.=utf8_decode($row['p16']).",";
        $data.=utf8_decode($row['p17']).",";
        $data.=utf8_decode($row['p18']).",";
        $data.=utf8_decode($row['p19']).",";
        $data.=utf8_decode($row['p20']).",";
        $data.=",";

        $query = "SELECT t1.* FROM valid035_test1 t1 WHERE t1.employee = '$empleado'";
        $queryres = $db->query($query);
        $array_preguntas = $queryres->fetch();

        $indice = 1;
        $contadorsi = 0;
        $contadorno = 0;
        foreach($array_preguntas as $pregunta)
        {
            //Contamos las preguntas que se hayan contestado con si y a su vez el indice de la pregunta
            if($pregunta=="1")
            {
                $contadorsi++;
            }
            else
            {
                $contadorno++;
            }

            //validamos que la primera seccion todas sean no
            if($contadorno>0 && $indice ==6)
            {
                $data.="No necesita valoracion clinica,preguntas si $contadorsi,preguntas no $contadorno,";
                $contadorsi = 0;
                $contadorno = 0;
            }
            elseif($contadorsi>0 && $indice>6 && $indice<9)
            {
                $data.="Necesita valoracion clinica, preguntas si $contadorsi,preguntas no $contadorno,";
                $contadorsi = 0;
                $contadorno = 0;
            }
            elseif($contadorsi>2 && $indice>8 && $indice<16)
            {
                $data.="Necesita valoracion clinica, preguntas si $contadorsi,preguntas no $contadorno,";
                $contadorsi = 0;
                $contadorno = 0;
            }
            elseif($contadorsi>1 && $indice>15 && $indice<22)
            {
                $data.="Necesita valoracion clinica, preguntas si $contadorsi,preguntas no $contadorno,";
                $contadorsi = 0;
                $contadorno = 0;
            }
            $indice++;   
        }
        $data.="\n";
    }

 echo $data;
 exit();
?>