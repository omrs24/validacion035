<?php
    //include_once('includes/db.php');
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
    
    /*if($_SESSION["authenticated_user"] != true) {
        header("Location: login.php");
        die();
    }*/
    
?>
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/estilos-demo.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos-preguntas.css">
    <link rel="stylesheet" href="admin/iconos/css/fontello.css">
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
        <!--MENU CON PESTANAS-->
        <div class="container pt-5">
            <?php 
            $id = $_SESSION['ID'];
            $query = "SELECT * FROM valid035_test1 WHERE employee ='$id'";
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
                <!--GUÍA 1-->
                <div id="cont-odo">
                <!--SECCIÓN 1-->
                    <div class="row mt-5">
                        <div class="col-lg-8 order-2 order-lg-1 mt-3 mt-lg-0">
                            <p>
                                <a href="#bloque1" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="bloque1" class="btn btn-nom expansor-enlaces">
                                    Sección 1.- Acontecimiento traumático severo.
                                </a>
                            </p>
                            <div class="collapse show" id="bloque1" style="">
                                <div class="card">
                                    <div class="card-body">
                                        <h6>¿Ha presenciado o sufrido alguna vez, durante o con motivo del trabajo un acontecimiento como los siguientes:</h6>
                                        <hr>
                                        <!--Pregunta 1-->
                                        <p>Accidente que tenga como consecuencia la muerte, la pérdida de un miembro o una lesión grave?</p>
                                        <div class="row justify-content-center">
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-light btn-si">
                                                    <input type="radio" name="pregunta1" id="Si1" autocomplete="off" value="si">Sí <!--Importante llenar el MISMO name para ambos Radio buttons-->
                                                </label>
                                                <label class="btn btn-light btn-si">
                                                        <input type="radio" name="pregunta1" id="No1" autocomplete="off" value="no">No
                                                </label>
                                            </div>
                                        </div>
                                        <hr>
                                        <!--Pregunta 2-->
                                        <p>Asaltos?</p>
                                        <div class="row justify-content-center">
                                            <div class="btn-group btn-group-toggle align-items-center" data-toggle="buttons">
                                                <label class="btn btn-light btn-si">
                                                    <input type="radio" name="pregunta2" id="Si2" autocomplete="off" value="si">Sí <!--Importante llenar el MISMO name para ambos Radio buttons-->
                                                </label>
                                                <label class="btn btn-light btn-si">
                                                        <input type="radio" name="pregunta2" id="No2" autocomplete="off" value="no">No
                                                </label>
                                            </div>
                                        </div>
                                        <hr>
                                        <!--Pregunta 3-->
                                        <p>Actos violentos que derivaron en lesiones graves?</p>
                                        <div class="row justify-content-center">
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-light btn-si">
                                                    <input type="radio" name="pregunta3" id="Si3" autocomplete="off" value="si">Sí <!--Importante llenar el MISMO name para ambos Radio buttons-->
                                                </label>
                                                <label class="btn btn-light btn-si">
                                                        <input type="radio" name="pregunta3" id="No3" autocomplete="off" value="no">No
                                                </label>
                                            </div>
                                        </div>
                                        <hr>
                                        <!--Pregunta 4-->
                                        <p>Secuestro?</p>
                                        <div class="row justify-content-center">
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-light btn-si">
                                                    <input type="radio" name="pregunta4" id="Si4" autocomplete="off" value="si">Sí <!--Importante llenar el MISMO name para ambos Radio buttons-->
                                                </label>
                                                <label class="btn btn-light btn-si">
                                                        <input type="radio" name="pregunta4" id="No4" autocomplete="off" value="no">No
                                                </label>
                                            </div>
                                        </div>
                                        <hr>
                                        <!--Pregunta 5-->
                                        <p>Amenazas?</p>
                                        <div class="row justify-content-center">
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-light btn-si">
                                                    <input type="radio" name="pregunta5" id="Si5" autocomplete="off" value="si">Sí <!--Importante llenar el MISMO name para ambos Radio buttons-->
                                                </label>
                                                <label class="btn btn-light btn-si">
                                                        <input type="radio" name="pregunta5" id="No5" autocomplete="off" value="no">No
                                                </label>
                                            </div>
                                        </div>
                                        <hr>
                                        <!--Pregunta 6-->
                                        <p>Cualquier otro que ponga en riesgo su vida o salud, y/o la de otras personas?</p>
                                        <div class="row justify-content-center">
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-light btn-si">
                                                    <input type="radio" name="pregunta6" id="Si6" autocomplete="off" value="si">Sí <!--Importante llenar el MISMO name para ambos Radio buttons-->
                                                </label>
                                                <label class="btn btn-light btn-si">
                                                        <input type="radio" name="pregunta6" id="No6" autocomplete="off" value="no">No
                                                </label>
                                            </div>
                                        </div>  
                                        <br>
                                        <br>
                                        <div class="row justify-content-center">
                                            <div class="col-sm-3">
                                                <input type="button" class="btn btn-primary" value="Terminar seccion" onclick="evaluar()">
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 order-1 order-lg-2 d-flex justify-content-center btn-instrucciones">
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modal-instrucciones">
                                Instrucciones
                            </button>
                            <div class="modal fade" id="modal-instrucciones" tabindex="-1" role="dialog" aria-labelledby="modal-instrucciones" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Instrucciones</h5>
                                            <button class="close" data-dismiss="modal" aria-label="Cerrar">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="carousel slide" id="carousel-instrucciones" data-ride="carousel">
                                                            <!--<ol class="carousel-indicators bg-mov-instrucciones-ol">
                                                                <li data-target="#carousel-instrucciones" data-slide-to="0" class="active"></li>
                                                                <li data-target="#carousel-instrucciones" data-slide-to="1"></li>
                                                                <li data-target="#carousel-instrucciones" data-slide-to="2"></li>
                                                            </ol>-->
                                                            <div class="carousel-inner">
                                                                <div class="carousel-item active">
                                                                    <!--<img src="img/instruccion1.gif" alt="instrucción 1">-->
                                                                    <div class="contenedor-video">
                                                                        <video src="img/Tut1.mp4" witdh="500px" height="300px"autoplay muted loop></video>
                                                                    </div>
                                                                    <div class="carousel-caption d-none d-md-block">
                                                                        <!---->
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <span class="badge badge-pill badge-warning self-align-center">Despliega las preguntas haciendo tap sobre la sección.</span>
                                                                        </div>
                                                                    </div>    
                                                                </div>
                                                                <div class="carousel-item">
                                                                        <video src="img/Tut2.mp4" witdh="500px" height="300px"autoplay muted loop></video>
                                                                        <div class="row">
                                                                        <div class="col">
                                                                            <span class="badge badge-pill badge-warning self-align-center">Selecciona la repuesta con la que más te identifiques.</span>
                                                                        </div>
                                                                    </div>    
                                                                </div>
                                                                <div class="carousel-item">
                                                                    <img src="https://picsum.photos/500/300">                                                            
                                                                </div>                                                            
                                                            </div>
                                                            <a href="#carousel-instrucciones" class="carousel-control-prev" data-slide="prev">
                                                                <span class="carousel-control-prev-icon bg-mov-instrucciones" aria-hidden="true"></span>
                                                            </a>
                                                            <a href="#carousel-instrucciones" class="carousel-control-next" data-slide="next">
                                                                <span class="carousel-control-next-icon bg-mov-instrucciones" aria-hidden="true"></span>
                                                            </a>                                                    
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-success" data-dismiss="modal">Entendido</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                <!--SECCIÓN 2-->
                    <div class="row mt-2 d-none" id="section2">
                        <div class="col-lg-8">
                            <p>
                                <a href="#bloque2" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="bloque2" class="btn btn-nom expansor-enlaces">
                                    Sección 2.- Recuerdos persistentes sobre el acontecimiento (durante el último mes).
                                </a>
                            </p>
                            <div class="collapse" id="bloque2">
                                <div class="card">
                                    <div class="card-body">
                                        <!--Pregunta 1-->
                                        <p>Accidente que tenga como consecuencia la muerte, la pérdida de un miembro o una lesión grave?</p>
                                        <div class="row justify-content-center">
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-light btn-si">
                                                    <input type="radio" name="pregunta7" id="Si7" autocomplete="off" value="si">Sí <!--Importante llenar el MISMO name para ambos Radio buttons-->
                                                </label>
                                                <label class="btn btn-light btn-si">
                                                        <input type="radio" name="pregunta7" id="No7" autocomplete="off" value="no">No
                                                </label>
                                            </div>
                                        </div>
                                        <hr>
                                        <!--Pregunta 2-->
                                        <p>¿Ha tenido sueños de carácter recurrente sobre el acontecimiento, que le producen malestar?</p>
                                        <div class="row justify-content-center">
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-light btn-si">
                                                    <input type="radio" name="pregunta8" id="Si8" autocomplete="off" value="si">Sí <!--Importante llenar el MISMO name para ambos Radio buttons-->
                                                </label>
                                                <label class="btn btn-light btn-si">
                                                        <input type="radio" name="pregunta8" id="No8" autocomplete="off" value="no">No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <!--SECCIÓN 3-->
                    <div class="row mt-2 d-none" id="section3">
                        <div class="col-lg-8">
                            <p>
                                <a href="#bloque3" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="bloque3" class="btn btn-nom expansor-enlaces">
                                    Sección 3.- Esfuerzo por evitar circunstancias parecidas o asociadas al acontecimiento (durante el último mes). 
                                </a>
                            </p>
                            <div class="collapse" id="bloque3">
                                <div class="card">
                                    <div class="card-body">
                                        <!--Pregunta 1-->
                                        <p>¿Se ha esforzado por evitar todo tipo de sentimientos, conversaciones o situaciones que le puedan recordar el acontecimiento?</p>
                                        <div class="row justify-content-center">
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-light btn-si">
                                                    <input type="radio" name="pregunta9" id="Si9" autocomplete="off" value="si">Sí <!--Importante llenar el MISMO name para ambos Radio buttons-->
                                                </label>
                                                <label class="btn btn-light btn-si">
                                                        <input type="radio" name="pregunta9" id="No9" autocomplete="off" value="no">No
                                                </label>
                                            </div>
                                        </div>
                                        <hr>
                                        <!--Pregunta 2-->
                                        <p>¿Se ha esforzado por evitar todo tipo de actividades, lugares o personas que motivan recuerdos del acontecimiento?</p>
                                        <div class="row justify-content-center">
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-light btn-si">
                                                    <input type="radio" name="pregunta10" id="Si10" autocomplete="off" value="si">Sí <!--Importante llenar el MISMO name para ambos Radio buttons-->
                                                </label>
                                                <label class="btn btn-light btn-si">
                                                        <input type="radio" name="pregunta10" id="No10" autocomplete="off" value="no">No
                                                </label>
                                            </div>
                                        </div>
                                        <!--Pregunta 3-->
                                        <p>¿Ha tenido dificultad para recordar alguna parte importante del evento?</p>
                                        <div class="row justify-content-center">
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-light btn-si">
                                                    <input type="radio" name="pregunta11" id="Si11" autocomplete="off" value="si">Sí <!--Importante llenar el MISMO name para ambos Radio buttons-->
                                                </label>
                                                <label class="btn btn-light btn-si">
                                                        <input type="radio" name="pregunta11" id="No11" autocomplete="off" value="si">No
                                                </label>
                                            </div>
                                        </div>
                                        <!--Pregunta 4-->
                                        <p>¿Ha disminuido su interés en sus actividades cotidianas?</p>
                                        <div class="row justify-content-center">
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-light btn-si">
                                                    <input type="radio" name="pregunta12" id="Si12" autocomplete="off" value="si">Sí <!--Importante llenar el MISMO name para ambos Radio buttons-->
                                                </label>
                                                <label class="btn btn-light btn-si">
                                                        <input type="radio" name="pregunta12" id="No12" autocomplete="off" value="no">No
                                                </label>
                                            </div>
                                        </div>
                                        <!--Pregunta 5-->
                                        <p>¿Se ha sentido usted alejado o distante de los demás?</p>
                                        <div class="row justify-content-center">
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-light btn-si">
                                                    <input type="radio" name="pregunta13" id="Si13" autocomplete="off" value="si">Sí <!--Importante llenar el MISMO name para ambos Radio buttons-->
                                                </label>
                                                <label class="btn btn-light btn-si">
                                                        <input type="radio" name="pregunta13" id="No13" autocomplete="off" value="no">No
                                                </label>
                                            </div>
                                        </div>
                                        <!--Pregunta 6-->
                                        <p>¿Ha notado que tiene dificultad para expresar sus sentimientos?</p>
                                        <div class="row justify-content-center">
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-light btn-si">
                                                    <input type="radio" name="pregunta14" id="Si14" autocomplete="off" value="si">Sí <!--Importante llenar el MISMO name para ambos Radio buttons-->
                                                </label>
                                                <label class="btn btn-light btn-si">
                                                        <input type="radio" name="pregunta14" id="No14" autocomplete="off" value="no">No
                                                </label>
                                            </div>
                                        </div>
                                        <!--Pregunta 7-->
                                        <p>¿Ha tenido la impresión de que su vida se va a acortar, que va a morir antes que otras personas o que tiene un futuro limitado?</p>
                                        <div class="row justify-content-center">
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-light btn-si">
                                                    <input type="radio" name="pregunta15" id="Si15" autocomplete="off" value="si">Sí <!--Importante llenar el MISMO name para ambos Radio buttons-->
                                                </label>
                                                <label class="btn btn-light btn-si">
                                                        <input type="radio" name="pregunta15" id="No15" autocomplete="off" value="no">No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <!--SECCIÓN 4-->
                <div class="row mt-2 d-none" id="section4">
                    <div class="col-lg-8">
                        <p>
                            <a href="#bloque4" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="bloque4" class="btn btn-nom expansor-enlaces">
                                Sección 4.- Afectación (durante el último mes). 
                            </a>
                        </p>
                        <div class="collapse" id="bloque4">
                            <div class="card">
                                <div class="card-body">
                                    <!--Pregunta 1-->
                                    <p>¿Ha tenido usted dificultades para dormir?</p>
                                    <div class="row justify-content-center">
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-light btn-si">
                                                <input type="radio" name="pregunta16" id="Si16" autocomplete="off" value="si">Sí <!--Importante llenar el MISMO name para ambos Radio buttons-->
                                            </label>
                                            <label class="btn btn-light btn-si">
                                                    <input type="radio" name="pregunta16" id="No16" autocomplete="off" value="no">No
                                            </label>
                                        </div>
                                    </div>
                                    <hr>
                                    <!--Pregunta 2-->
                                    <p>¿Ha estado particularmente irritable o le han dado arranques de coraje?</p>
                                    <div class="row justify-content-center">
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-light btn-si">
                                                <input type="radio" name="pregunta17" id="Si17" autocomplete="off" value="si">Sí <!--Importante llenar el MISMO name para ambos Radio buttons-->
                                            </label>
                                            <label class="btn btn-light btn-si">
                                                    <input type="radio" name="pregunta17" id="No17" autocomplete="off" value="no">No
                                            </label>
                                        </div>
                                    </div>
                                    <!--Pregunta 3-->
                                    <p>¿Ha tenido dificultad para concentrarse?</p>
                                    <div class="row justify-content-center">
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-light btn-si">
                                                <input type="radio" name="pregunta18" id="Si18" autocomplete="off" value="si">Sí <!--Importante llenar el MISMO name para ambos Radio buttons-->
                                            </label>
                                            <label class="btn btn-light btn-si">
                                                    <input type="radio" name="pregunta18" id="No18" autocomplete="off" value="no">No
                                            </label>
                                        </div>
                                    </div>
                                    <!--Pregunta 4-->
                                    <p>¿Ha estado nervioso o constantemente en alerta?</p>
                                    <div class="row justify-content-center">
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons"> 
                                            <label class="btn btn-light btn-si">
                                                <input type="radio" name="pregunta19" id="Si19" autocomplete="off" value="si">Sí <!--Importante llenar el MISMO name para ambos Radio buttons-->
                                            </label>
                                            <label class="btn btn-light btn-si">
                                                    <input type="radio" name="pregunta19" id="No19" autocomplete="off" value="no">No
                                            </label>
                                        </div>
                                    </div>
                                    <!--Pregunta 5-->
                                    <p>¿Se ha sobresaltado fácilmente por cualquier cosa?</p>
                                    <div class="row justify-content-center">
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-light btn-si">
                                                <input type="radio" name="pregunta20" id="Si20" autocomplete="off" value="si">Sí <!--Importante llenar el MISMO name para ambos Radio buttons-->
                                            </label>
                                            <label class="btn btn-light btn-si">
                                                    <input type="radio" name="pregunta20" id="No20" autocomplete="off" value="no">No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
                 <!--buttons-->
                <div class="row justify-content-center mt-5">
                    <div class="col-sm-3">
                        <input type="submit" class="btn btn-primary d-none" value="Enviar respuestas" id="btnSendTest" onclick="evaluar()">
                    </div>
                </div> 
            <?php  
            }
            ?>
        </div>
        </form>
    </div>
</div>
    <footer class="footer">
        <div class="contenedor d-none">
            Footer
        </div>
    </footer>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
    <script>
        $('#send-test').on('submit', function(e){
            e.preventDefault();

            var datos = $(this).serializeArray();

            $.ajax({
                type: $(this).attr('method'),
                data: datos,
                url: 'includes/savetest.php',
                dataType: 'json',
                success: function(data){
                    console.log(data);
                    alert("Ha terminado el cuestionario");
                    location.reload();
                }
            })
        });
    
    function evaluar()
    {
        var btn = document.getElementById('btnSendTest');
        var oc1 = document.getElementById('section2'),oc2 = document.getElementById('section3'), oc3 = document.getElementById('section4');
        const pregunta1 = $("input[name='pregunta1']:checked").val(),pregunta2 = $("input[name='pregunta2']:checked").val(),pregunta3 = $("input[name='pregunta3']:checked").val(),pregunta4 = $("input[name='pregunta4']:checked").val(),pregunta5 = $("input[name='pregunta5']:checked").val(),pregunta6 = $("input[name='pregunta6']:checked").val();
        //document.getElementById('GFG').checked
        if(!pregunta1 || !pregunta2 || !pregunta3 || !pregunta4 || !pregunta5 || !pregunta6)
        {
            alert("Debes contestar todas las preguntas para continuar");
            //return false;
        }
        else
        {
            if(document.getElementById('No1').checked & document.getElementById('No2').checked & document.getElementById('No3').checked & document.getElementById('No4').checked & document.getElementById('No5').checked & document.getElementById('No6').checked)
            { 
                oc1.classList.add("d-none");
                oc2.classList.add("d-none");
                oc3.classList.add("d-none");
                oc1.classList.remove("d-block");
                oc2.classList.remove("d-block");
                oc3.classList.remove("d-block");
                btn.classList.add("d-block");
            }
            else
            {
                oc1.classList.add("d-block");
                oc2.classList.add("d-block");
                oc3.classList.add("d-block");
                oc1.classList.remove("d-none");
                oc2.classList.remove("d-none");
                oc3.classList.remove("d-none");
                btn.classList.add("d-block");
            }   
        }
    }
    function evaluarglobal()
    {
        
    }
    </script>
</body>
</html>