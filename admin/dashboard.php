<?php
    /*session_start();
    include_once('../includes/db.php');

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
        header("Location: ../login.php");
        die();
    }*/
?>
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="iconos/css/fontello.css">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/estilos-dashboard.css">
    <link rel="stylesheet" href="../css/mediaqueries.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <title>Dashboard</title>
    <!--<style>
        .row div{
            background-color: beige;
            margin: 5px 0; 
            text-align: center;
            border: solid 2px black;
        }
        @media screen and (max-width:1200px) and (min-width:992px){ /*Tamaño Largo (computadoras)*/
            .row div{
            background-color: red;
            }   
        }
        @media screen and (max-width:991px) and (min-width:768px){ /*Tamaño Mediano (tabletas)*/
            .row div{
            background-color: blue;
            }   
        }
        @media screen and (max-width:767px) and (min-width:576px){ /*Tamaño Pequeño (smartphones)*/
            .row div{
            background-color: green;
            }   
        }
        @media screen and (max-width:575px){ /*Tamaño Extra pequeño (smartphones)*/
            .row div{
            background-color: pink;
            }   
        }                
    </style>-->
</head>
<body>
    <div class="content">
    <div class="container-fluid" id="contenPrinc">
        <form id="usersForm" action="" method="POST">
            <div class="row">
            <div class="barra-lateral col-12 col-sm-auto">
                <div class="logo">
                    <h2>Administrador</h2>
                </div>
                <nav class="menu d-flex d-sm-block justify-content-center flex-wrap">
                    <a href="#empleados" onclick="mostrar('usuarios','organizacion','resultados','configuracion','companias')"><i class="icon-users"></i><span>Añadir empleados</span></a>
                    <a href="#resultados" onclick="mostrar('resultados','organizacion','usuarios','configuracion','companias')" class="disabled"><i class="far fa-chart-bar"></i><span>Resultados</span></a>                    
                    <a href="#configuracion" onclick="mostrar('configuracion','organizacion','usuarios','resultados','companias')" class="disabled"><i class="icon-cog-alt"></i><span>Configuración</span></a>
                    <?php
                    /*$sadmin = $_SESSION["sadmin"];
                    if($sadmin == 1)
                    {*/
                    ?>
                    <a href="#admins" class="mt-0" onclick="mostrar('organizacion','resultados','usuarios','configuracion','companias')"><i class="fas fa-user"></i><span>Añadir administrador</span></a>
                    <a href="#companias" onclick="mostrar('companias','configuracion','organizacion','usuarios','resultados')"><i class="fas fa-building"></i><span>Compa&ntilde;&iacute;as y sucursales</span></a>
                    <?php/*
                    }*/
                    ?>
                    <a href="../includes/logout.php"><i class="icon-logout mb-0"></i><span>Salir</span></a>
                </nav>
            </div>
            <main class="main col">
                <div class="row">
                    <div class="col">
                        <div class="organizacion d-none" id="organizacion">
                            <?php
                            include('plantillas/a-admin.php');
                            ?>
                        </div>
                        <div class="usuarios d-block" id="usuarios">
                            <?php
                            include('plantillas/a-empleados.php');
                            ?>
                        </div>
                        <div class="resultados d-none" id="resultados">
                            <?php
                            include('plantillas/resultados.php');
                            ?>
                        </div>                        
                        <div class="configuracion d-none" id="configuracion">
                            <?php
                            include('plantillas/configuracion.php');
                            ?>
                        </div>  
                        <div class="companias d-none" id="companias">
                            <?php
                            include('plantillas/companias.php');
                            ?>
                        </div>  
                    </div>
                </div>
            </main>
        </div>
        </form>
    </div>    
    </div>
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/popper.min.js.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/dashboard.js"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
    <script>
        $("#btnCrearAdmin").on("click", function(e){
            e.preventDefault();
            $('#usersForm').attr('action', "../includes/registeradmin.php").submit();
        });
        $("#btnCrearEmpleado").on("click", function(e){
            e.preventDefault();
            $('#usersForm').attr('action', "../includes/registeruser.php").submit();
        });
        $("#btnCrearSucursal").on("click", function(e){
            e.preventDefault();
            $('#usersForm').attr('action', "../includes/registersucursal.php").submit();
        });
        $("#btnCrearCompania").on("click", function(e){
            e.preventDefault();
            $('#usersForm').attr('action', "../includes/registercompania.php").submit();
        });
        $("#btnExportXlx").on("click", function(e){
            e.preventDefault();
            $('#usersForm').attr('action', "../includes/exportExcel.php").submit();
        });
        $("#btnExportXlx2").on("click", function(e){
            e.preventDefault();
            $('#usersForm').attr('action', "../includes/exportExcel2.php").submit();
        });
        //Data tables
        $(document).ready(function () {
          $('#dtUsers').DataTable({
            "pagingType": "simple_numbers", // "simple" option for 'Previous' and 'Next' buttons only
            "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
            },
            dom: 'Bfrtip',
            buttons: [
                'csv', 'excel', 'pdf'
            ]
          });
          $('#dtAdmins').DataTable({
            "pagingType": "simple_numbers", // "simple" option for 'Previous' and 'Next' buttons only
            "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
            }
          });
          $('#dtResult').DataTable({
            "pagingType": "simple_numbers", // "simple" option for 'Previous' and 'Next' buttons only
            "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
            }
          });
          $('.dataTables_length').addClass('bs-select');
          $('.dt-buttons').addClass('bg-success');
        });
        
        /*----------------------------------------LLENAR DATOS DE USUARIO SELECCIONADO--------------------------------------*/
        
        $(".edit-emp").click(function() {
            $.post("dashboard.php?empleadoID=" + $(this).data("id"), function(data) {
                $(".content").html(data);
            });
        });   
        $(".btnUser").click(function(){
            var dataId = $(this).attr('data-id');
            //$("#save-role").attr('data-id', dataId);
            $.ajax({
                url: "../includes/getUserData.php",
                type: 'post',
                data: {
                    id : dataId
                }, 
                dataType: 'JSON',
                success: function(result){
                    //LLear datos del usuario que se selecciono
                    //$("#tree-rol input[name='maxdesc']").val(result.maxdesc);
                    console.log(result);
                    //Llenamos el modalcon los datos que nos regresan
                    $("#txtUsuario").text("");
                    $("#txtUsuario").text(result[0].nombre);
                    //Para calificacion del
                    var cCat = new Array();
                    cCat[0] = 0;
                    cCat[1] = 0;
                    cCat[2] = 0;
                    cCat[3] = 0;
                    cCat[4] = 0;

                    //Para Ambiente de trabajo item 1,3
                    var i;
                    for (i = 0; i < 75; i++) {
                        //Primer categoria 1,3
                        if(i==0 || i==2){
                            cCat[0] += parseInt(result[0].preguntas[i]);
                        }
                        //Segunda categoria 6-16, 23-30 , 35-36 , vendedor 65-69
                        if( (i >= 5 && i <= 15) || (i>=22 && i <=29) || (i >=34 && i<=35) || (i>=65 && i<=68) ){
                            cCat[1] += parseInt(result[0].preguntas[i]);
                        }
                        //tercera categoria 17-22
                        if(i >= 16 && i <= 21){
                            cCat[2] += parseInt(result[0].preguntas[i]);
                        }
                        //Cuarta categoria
                        if( (i >= 30 && i <= 33) || (i>=36 && i <=45) || (i >=56 && i<=63) || (i>=70 && i<=73) ){
                            cCat[3] += parseInt(result[0].preguntas[i]);
                            console.log(result[0].preguntas[i]);
                        }
                        //Quinta categoria
                        if(i >= 46 && i <=55){
                            cCat[4] += parseInt(result[0].preguntas[i]);
                        }
                    }
                    console.log(cCat);
                    $("#txtAmbienteTrabajo").text(cCat[0]);
                    $("#txtFactoresPropios").text(cCat[1]);
                    $("#txtOrganizacionTiempo").text(cCat[2]);
                    $("#txtLiderazgoRelaciones").text(cCat[3]);
                    $("#txtEntornoOrg").text(cCat[4]);
                    
                    var cDom = new Array();
                    cDom[0] = 0;
                    cDom[1] = 0;
                    cDom[2] = 0;
                    cDom[3] = 0;
                    cDom[4] = 0;
                    cDom[5] = 0;
                    cDom[6] = 0;
                    cDom[7] = 0;
                    cDom[8] = 0;
                    cDom[9] = 0;
                    cDom[10] = 0;

                    //Calificacion por dominio
                    for (i = 0; i < 75; i++) {
                        //Primer dominio 1,3
                        if(i==0 || i==2){
                            cDom[0] += parseInt(result[0].preguntas[i]);
                        }
                        //Segunda dominio 6-16, vendedor 65-69
                        if( (i >= 5 && i <= 15) || (i>=65 && i<=68) ){
                            cDom[1] += parseInt(result[0].preguntas[i]);
                        }
                        //tercer dominio 23-30 , 35-36 ,
                        if((i>=22 && i <=29) || (i >=34 && i<=35)){
                            cDom[2] += parseInt(result[0].preguntas[i]);
                        }
                        //cuarto dominio 17-18
                        if(i >= 16 && i <= 17){
                            cDom[3] += parseInt(result[0].preguntas[i]);
                        }
                        //Quinto dominio 19-22
                        if(i >= 18 && i <= 21){
                            cDom[4] += parseInt(result[0].preguntas[i]);
                        }
                        //sexto dominio 31-34, 37-41
                        if( (i >= 30 && i <= 33) || (i>=36 && i <=40)){
                            cDom[5] += parseInt(result[0].preguntas[i]);
                        }
                        //Septimo dominio
                        if((i >= 41 && i <=45) || (i >= 70 && i <=73)){
                            cDom[6] += parseInt(result[0].preguntas[i]);
                        }
                        //Octavo dominio
                        if(i >= 56 && i <=63){
                            cDom[7] += parseInt(result[0].preguntas[i]);
                        }
                        //noveno dominio
                        if(i >= 46 && i <=51){
                            cDom[8] += parseInt(result[0].preguntas[i]);
                        }
                        //decimo dominio
                        if(i >= 52 && i <=55){
                            cDom[9] += parseInt(result[0].preguntas[i]);
                        }
                    }

                    $("#txtCondicAmbiente").text(cDom[0]);
                    $("#txtCargaTrabajo").text(cDom[1]);
                    $("#txtControlTrabajo").text(cDom[2]);
                    $("#txtJornadaTrabajo").text(cDom[3]);
                    $("#txtInterfTF").text(cDom[4]);
                    $("#txtLiderazgo").text(cDom[5]);
                    $("#txtRelacionesTrabajo").text(cDom[6]);
                    $("#txtViolencia").text(cDom[7]);
                    $("#txtReconoDesemp").text(cDom[8]);
                    $("#txtInsuficienciaSentido").text(cDom[9]);
                    console.log(cDom);
                }
                });
        });     
    </script>
</body>
</html>