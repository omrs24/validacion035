<?php
    include_once('includes/db.php');
    session_start();
    $timeout = 7200; // 2 hours
    if(isset($_SESSION['timeout'])) {
        $duration = time() - (int)$_SESSION['timeout'];
        if($duration > $timeout) {
            session_destroy();
            session_start();
        }
    }
    $_SESSION['timeout'] = time();
    
    if($_SESSION["authenticated_user"] != true) {
        header("Location: login.php");
        die();
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/estilos-demo.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos-preguntas.css">
    <title>Cuestionarios</title>
</head>
<body>
    <header class="cabecera-fija fixed-top">
        <div class="contenedor contenedor-logo-nav">
            <a href="#" class="logo"> <?php echo 'Cuestionario'; ?> </a>
            <span class="menu-icon">
                    Menú
             </span>
            <nav class="navegacion">
               <ul>
                   <li>
                       <a href="/formularios/index.php">Inicio</a>
                   </li>
                   <li>
                       <a href="/formularios/demo.php">Test 1</a>
                   </li>
                   <li>
                       <a href="/formularios/test2.php">Test 2</a>
                   </li>
                   <li>
                       Bienvenido <span class="font-weight-bold"><?php echo $_SESSION['nombrecorto'];?></span>
                   </li>
                   <li>
                       <a href="includes/logout.php"><span>Salir</span><i class="icon-logout"></i></a>
                   </li>
               </ul>
            </nav>
        </div>
    </header>
    
        <div class="container pt-5">
        <form id="send-test" action="" method="POST" class="form">
            <!--MENSAJE DE CUESTIONARIO YA CONTESTADO-->
                <div class="container d-none" id="contestadoantes">
                    <div class="row mt-5 justify-content-center">
                        <div class="col-lg-8">
                            <h3 class="text-success">Todo listo</h3>
                        </div>    
                    </div>
                    <div class="row mt-2 justify-content-center">
                        <div class="col-lg-8">
                            <span class="p-5 text-danger">Ya has contestado el cuestionario.</span>
                        </div>    
                    </div>
                </div>
            <?php 
            $id = $_SESSION['ID'];
            $query = "SELECT * FROM valid035_test2 WHERE employee ='$id'";
            $retval = $db->query($query);
            $row = $retval->fetch();
            $empid = $row['employee'];
            if($id == $empid)
            {
                ?>
                <!--MENSAJE DE CUESTIONARIO YA CONTESTADO-->
                <div class="container border border-dark bg-light rounded p-5 mt-5" id="contestadoantes">
                    <div class="row mt-5 justify-content-center">
                        <div class="col-lg-8">
                            <h2 class="text-dark text-weight-bolder">Todo listo</h2>
                        </div>    
                    </div>
                    <div class="row mt-2 justify-content-center">
                        <div class="col-lg-8">
                            <span class="p-5 text-secondary text-weight-bolder">Ya has contestado el cuestionario.</span>
                        </div>
                    </div>
                    <div class="row mt-3 justify-content-end">
                        <div class="col-lg-4 align-text-right">
                            <a href="includes/logout.php" class="text-dark text-decoration-none"><span>Salir</span><i class="icon-logout"></i></a>
                        </div>
                    </div>
                </div>
                <?php
            }
            else
            {
            ?>
                <!--GUÍA 2-->
                <div class="row mt-5">
                    <div class="col">
                        <p>
                            <a href="#Guia2" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="Guia2" class="btn btn-nom expansor-enlaces">
                                Guía 2.- Identificaci&oacute;n y analisis de factores de riesgo psicosocial
                            </a>
                        </p>
                        <div class="collapse" id="Guia2">
                            <div class="card">
                                <div class="card-body">
                                    <h4>Para responder las preguntas siguientes considere las condiciones de su centro de trabajo, así como la cantidad y ritmo de trabajo.</h4>
                                        <hr>
                                        <?php
                                        $arrayGuia1 = array(
                                        "Mi trabajo me exige hacer mucho esfuerzo físico",                                 
                                        "Me preocupa sufrir un accidente en mi trabajo",
                                        "Considero que las actividades que realizo son peligrosas",
                                        "Por la cantidad de trabajo que tengo debo quedarme tiempo adicional a mi turno",
                                        "Por la cantidad de trabajo que tengo debo trabajar sin parar",
                                        "Considero que es necesario mantener un ritmo de trabajo acelerado",
                                        "Mi trabajo exige que esté muy concentrado",
                                        "Mi trabajo requiere que memorice mucha información",
                                        "Mi trabajo exige que atienda varios asuntos al mismo tiempo",
                                        "En mi trabajo soy responsable de cosas de mucho valor",
                                        "Respondo ante mi jefe por los resultados de toda mi área de trabajo",
                                        "En mi trabajo me dan órdenes contradictorias",
                                        "Considero que en mi trabajo me piden hacer cosas innecesarias",
                                        "Trabajo horas extras más de tres veces a la semana",
                                        "Mi trabajo me exige laborar en días de descanso, festivos o fines de semana",
                                        "Considero que el tiempo en el trabajo es mucho y perjudica mis actividades familiares o personales",
                                        "Pienso en las actividades familiares o personales cuando estoy en mi trabajo",
                                        "Mi trabajo permite que desarrolle nuevas habilidades",
                                        "En mi trabajo puedo aspirar a un mejor puesto",
                                        "Durante mi jornada de trabajo puedo tomar pausas cuando las necesito",
                                        "Puedo decidir la velocidad a la que realizo mis actividades en mi trabajo",
                                        "Puedo cambiar el orden de las actividades que realizo en mi trabajo",
                                        "Me informan con claridad cuáles son mis funciones",
                                        "Me explican claramente los resultados que debo obtener en mi trabajo",
                                        "Me informan con quién puedo resolver problemas o asuntos de trabajo",
                                        "Me permiten asistir a capacitaciones relacionadas con mi trabajo",
                                        "Recibo capacitación útil para hacer mi trabajo",
                                        "Mi jefe tiene en cuenta mis puntos de vista y opiniones",
                                        "Mi jefe ayuda a solucionar los problemas que se presentan en el trabajo",
                                        "Puedo confiar en mis compañeros de trabajo",
                                        "Cuando tenemos que realizar trabajo de equipo los compañeros colaboran",
                                        "Mis compañeros de trabajo me ayudan cuando tengo dificultades",
                                        "En mi trabajo puedo expresarme libremente sin interrupciones",
                                        "Recibo críticas constantes a mi persona y/o trabajo",
                                        "Recibo burlas, calumnias, difamaciones, humillaciones o ridiculizaciones",
                                        "Se ignora mi presencia o se me excluye de las reuniones de trabajo y en la toma de decisiones",
                                        "Se manipulan las situaciones de trabajo para hacerme parecer un mal trabajador",
                                        "Se ignoran mis éxitos laborales y se atribuyen a otros trabajadores",
                                        "Me bloquean o impiden las oportunidades que tengo para obtener ascenso o mejora en mi trabajo",
                                        "He presenciado actos de violencia en mi centro de trabajo",
                                        //EMPIEZA CONDICIONAL
                                        "En mi trabajo debo brindar servicio a clientes o usuarios",
                                        "Atiendo clientes o usuarios muy enojados",
                                        "Mi trabajo me exige atender personas muy necesitadas de ayuda o enfermas",
                                        "Soy jefe de otros trabajadores",
                                        "Para hacer mi trabajo debo demostrar sentimientos distintos a los míos",
                                        "Comunican tarde los asuntos de trabajo",
                                        "Dificultan el logro de los resultados del trabajo",
                                        "Ignoran las sugerencias para mejorar su trabajo"
                                        );
                                        $indice=0;
                                        foreach($arrayGuia1 as $preguntas)
                                        {
                                            $indice++;
                                            if($indice == 41)
                                            {
                                                echo '
                                                <div class="row mt-2">
                                                    <div class="col-12 abs-center">
                                                    '.$indice.'.- '.$preguntas.'
                                                    </div>
                                                    <div class="col-12 abs-center">
                                                        <div class="btn-group-sm btn-group-toggle abs-center" data-toggle="buttons">
                                                            <label class="btn btn-light btn-outline-dark btn-si btn-g2 p-2 mt-2 mr-2">
                                                                    <input type="radio" name="g2p'.$indice.'" id="si41" autocomplete="off" value="si" onclick="eval41()">Si
                                                            </label>
                                                            <label class="btn btn-light btn-outline-dark btn-si btn-g2 p-2 mt-2 mr-2">
                                                                <input type="radio" name="g2p'.$indice.'" id="no41" autocomplete="off" value="no" onclick="eval41()">No                                          
                                                            </label>                                                           
                                                        </div>   
                                                    </div>
                                                </div>
                                                <hr>
                                                <div id="section41" class="d-none">';    
                                            }
                                            elseif($indice == 44)
                                            {
                                                echo '</div>
                                                <div class="row mt-2">
                                                    <div class="col-12 abs-center">
                                                    '.$indice.'.- '.$preguntas.'
                                                    </div>
                                                    <div class="col-12 abs-center">
                                                        <div class="btn-group-sm btn-group-toggle abs-center" data-toggle="buttons">
                                                            <label class="btn btn-light btn-outline-dark btn-si btn-g2 p-2 mt-2 mr-2">
                                                                    <input type="radio" name="g2p'.$indice.'" id="si44" autocomplete="off" value="si" onclick="eval44()">Si
                                                            </label>
                                                            <label class="btn btn-light btn-outline-dark btn-si btn-g2 p-2 mt-2 mr-2">
                                                                <input type="radio" name="g2p'.$indice.'" id="no44" autocomplete="off" value="no" onclick="eval44()">No                                          
                                                            </label>                                                           
                                                        </div>   
                                                    </div>
                                                </div>
                                                <hr>
                                                <div id="section44" class="d-none">';   
                                            }
                                            else
                                            {
                                                echo '
                                            <div class="row mt-2">
                                                <div class="col-12 abs-center">
                                                '.$indice.'.- '.$preguntas.'
                                                </div>
                                                <div class="col-12 abs-center">
                                                    <div class="btn-group-sm btn-group-toggle abs-center" data-toggle="buttons">
                                                        <label class="btn btn-light btn-outline-dark btn-si btn-g2 p-2 mt-2 mr-2">
                                                                <input type="radio" name="g2p'.$indice.'" id="S'.$indice.'" autocomplete="off" value="siempre" >Siempre
                                                        </label>
                                                        <label class="btn btn-light btn-outline-dark btn-si btn-g2 p-2 mt-2 mr-2">
                                                            <input type="radio" name="g2p'.$indice.'" id="CS'.$indice.'" autocomplete="off" value="casis">Casi <br>Siempre                                                 
                                                        </label>
                                                        <label class="btn btn-light btn-outline-dark btn-si btn-g2 p-2 mt-2 mr-2">
                                                                <input type="radio" name="g2p'.$indice.'" id="AV'.$indice.'" autocomplete="off" value="algunas">Algunas<br>Veces
                                                        </label>
                                                        <label class="btn btn-light btn-outline-dark btn-si btn-g2 p-2 mt-2 mr-2">
                                                                <input type="radio" name="g2p'.$indice.'" id="CN'.$indice.'" autocomplete="off" value="casin">Casi<br>Nunca
                                                        </label>
                                                        <label class="btn btn-light btn-outline-dark btn-si btn-g2 p-2 mt-2">
                                                                <input type="radio" name="g2p'.$indice.'" id="N'.$indice.'" autocomplete="off" value="nunca">Nunca
                                                        </label>                                                            
                                                    </div>   
                                                </div>
                                            </div>
                                            <hr>';
                                            }
                                        }
                                        ?>
                                        
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-5">
                        <div class="col-sm-3">
                            <input type="submit" class="btn btn-primary" value="Enviar respuestas" id="btnSendTest">
                        </div>
                    </div> 
                </div>
            <?php 
            }
            ?>
            </form>
    <footer class="footer">
        <div class="contenedor d-none">
            Footer
        </div>
    </footer>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/validate.js"></script>
    <script src="js/scripts.js"></script>
    <script>
        
        $('#send-test').on('submit', function(e){
            e.preventDefault();
            var datos = $(this).serializeArray();

            $.ajax({
                type: $(this).attr('method'),
                data: datos,
                url: 'includes/savetest2.php',
                dataType: 'json',
                success: function(data){
                    console.log(data);
                    alert("Ha terminado el cuestionario 2");
                }
            })
        });
        
        function eval41()
        {
            const pregunt41 = $('input[id=si41]:checked').val();
            var oc = document.getElementById('section41');

            if(pregunt41)
            {
                oc.classList.add("d-block");
                oc.classList.remove("d-none");
            }
            else
            {
                oc.classList.add("d-none");
                oc.classList.remove("d-block");
            }
        }
        function eval44()
        {
            const pregunt41 = $('input[id=si44]:checked').val();
            var oc = document.getElementById('section44');

            if(pregunt41)
            {
                oc.classList.add("d-block");
                oc.classList.remove("d-none");
            }
            else
            {
                oc.classList.add("d-none");
                oc.classList.remove("d-block");
            }
        }
        function evaluara()
        {
            var btn = document.getElementById('btnSendTest');
            <?php
            echo "const";
                for($i=1;$i<48;$i++)
                {
                    $preg = "$('input[name=pregunta". $i ."";
                    $pregunta = " pregunta". $i ." =  ". $preg . "]:checked').val()";
                    if($i==47)
                    {
                        $pregunta .= ";";
                    }
                    else
                    {
                        $pregunta .= ",";
                    }
                    echo $pregunta;
                }  
            ?>
            
            //document.getElementById('GFG').checked
            if(<?php 
                for($i=1;$i<48;$i++)
                {
                    $pregunta = "!pregunta". $i;
                    if($i==47)
                    {
                        $pregunta .= "";
                    }
                    else
                    {
                        $pregunta .= " || ";
                    }
                    echo $pregunta;
                }
            ?>)
            {
                alert("Debes contestar todas las preguntas para continuar");
                
            }
            else
            {
                return true;   
            }
        }
    </script>
</body>
</html>