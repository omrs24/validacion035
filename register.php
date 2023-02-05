<?php
    session_start();
    include_once('includes/db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/estilos-demo.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="admin/iconos/css/fontello.css">
    <title>Cuestionarios</title>
    <style>	/* Coded with love by Mutiullah Samim */
		body,
		html {
			margin: 0;
			padding: 0;
			height: 100%;
			
		}
		.user_card {
			height: 400px;
			width: 350px;
			margin-top: auto;
			margin-bottom: auto;
			background: #113f67;
			color:#fff;
			position: relative;
			display: flex;
			justify-content: center;
			flex-direction: column;
			padding: 10px;
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			-webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			-moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			border-radius: 5px;

		}
		.brand_logo_container {
			position: absolute;
			height: 170px;
			width: 170px;
			top: -75px;
			border-radius: 50%;
			padding: 10px;
			text-align: center;
		}
		.brand_logo {
			height: 150px;
			width: 150px;
			border-radius: 50%;
			border: 2px solid white;
		}
		.form_container {
			margin-top: 100px;
		}
		.login_btn {
			width: 100%;
			background: #c0392b !important;
			color: white !important;
		}
		.login_btn:focus {
			box-shadow: none !important;
			outline: 0px !important;
		}
		.login_container {
			padding: 0 2rem;
		}
		.input-group-text {
			background: #113f67 !important;
			color: white !important;
			border: 0 !important;
			border-radius: 0.25rem 0 0 0.25rem !important;
		}
		.input_user,
		.input_pass:focus {
			box-shadow: none !important;
			outline: 0px !important;
		}
		.custom-checkbox .custom-control-input:checked~.custom-control-label::before {
			background-color: #c0392b !important;
		}
		.loginError {
        	background-color: #f7b0b0;
        	padding: 10px;
        	color: #f26161;
        	font-family: Lato-Black;
        	opacity: 0;
        	transition: 0.2s linear all;
        }
    </style>
</head>
<body class="bg-light">
    <header class="cabecera-fija">
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
                       <a href="/formularios/login.php">Iniciar Sesion</a><i class="fas fa-sign-in-alt"></i>
                   </li>
                   <li>
                       <a href="#">Guía informativa</a>
                   </li>                   
               </ul>
            </nav>
        </div>
    </header>
    <form action="includes/registeruser.php" method="POST">
        <div class="container mt-5 border w-75 px-5 h-100 rounded bg-white">
        <div class="loginError" id="loginError">
    	    Usuario ya registrado	
        </div>
        <h3 class="mt-3 w-100" style="color:#113f67;">Bienvenido, ingresa tus datos para continuar: </h3>
	    <div class="row mt-5">
            <div class="col-lg-6">
                <div class="input-group-prepend">
                    <span class="input-group-text form-control mr-3">Nombre</span>
                </div>
                <div class="input-group input-group mb-3">
                    <input type="text" placeholder="Nombre" name="nombre-empleado" id="nombre-empleado" class="form-control mr-3" required>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-6">
                <div class="input-group-prepend">
                    <span class="input-group-text form-control mr-3">Apellido Paterno</span>
                </div>
                <div class="input-group input-group mb-3">
                    <input type="text" placeholder="Apellido Paterno" name="apellido-paterno-empleado" id="apellido-paterno-empleado" class="form-control mr-3" required>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="input-group-prepend">
                    <span class="input-group-text form-control mr-3">Apellido Materno</span>
                </div>
                <div class="input-group input-group mb-3">
                    <input type="text" placeholder="Apellido Materno" name="apellido-materno-empleado" id="apellido-materno-empleado" class="form-control mr-3" required>
                </div>
            </div>
        </div>
        <label id="result" name="result" class="d-none"></label>
        <div class="row mt-3">
            <div class="col-lg-6">
                <div class="input-group-prepend">
                    <span class="input-group-text form-control mr-3">Correo</span>
                </div>
                <div class="input-group input-group mb-3">
                    <input type="text" placeholder="Correo" name="correo-empleado" id="correo-empleado" class="form-control mr-3" required>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="input-group-prepend">
                    <span class="input-group-text form-control mr-3">RFC O CURP</span>
                </div>
                <div class="input-group input-group mb-3">
                    <input type="text" placeholder="RFC O CURP" name="rfcocurp-empleado" id="rfcocurp-empleado" class="form-control mr-3 pwd1" required>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-6">
                <div class="input-group-prepend">
                    <span class="input-group-text form-control mr-3">Compa&ntilde;&iacute;a</span>
                </div>
                <div class="input-group mb-3">
                    <select class="form-control mr-3" id="ddlcompaniaempleado" name="ddlcompaniaempleado" required>
                        <option value="" disabled selected>Selecciona...</option>
                        	<?php
                			$myQuery = $db->query("SELECT ID, CONCAT(nombre, ' (', ID, ')') nombre FROM valid035_companies ORDER BY nombre");
                			while($row = $myQuery->fetch()){			
                				echo "<option value='".$row["ID"]."'>".$row["nombre"]."</option>";
                			};
                			?>
                    </select>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="input-group-prepend">
                    <span class="input-group-text form-control mr-3">Sucursal</span>
                </div>
                <div class="input-group mb-3">
                    <select class="form-control mr-3" id="ddlsucursalempleado" name="ddlsucursalempleado" required>
                        <option value="" disabled selected>Selecciona...</option>
                        	<?php
                			$myQuery = $db->query("SELECT ID, CONCAT(name, ' (', ID, ')') name FROM valid035_offices ORDER BY name");
                			while($row = $myQuery->fetch()){			
                				echo "<option value='".$row["ID"]."'>".$row["name"]."</option>";
                			};
                			?>
                    </select>
                </div>
            </div>
        </div>
        <div class="row mt-3 mb-5 justify-content-center">
            <div class="col m-3">
                <input type="submit" class="btn btn-primary font-weight-bold" id="btnCrearEmpleado" value="Registrarse">
            </div>
        </div>	
	</div>
    </form>
    <footer class="footer">
        <div class="contenedor">
            Footer
        </div>
    </footer>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
    <script>
    /*$(document).on('change', '#ddlcompaniaempleado', function() {
    	orStore = $(this).val();
    	if (orStore == "Miguel Hidalgo") {
    		$("#zona").empty().append("<?php  ?>"");
    	} else if(orStore == "Cuauhtémoc") {
    		$("#zona").empty().append("<option value='' selected disabled>Selecciona...</option><option value='Cuauhtémoc'>Cuauhtémoc</option><option value='San Rafael'>San Rafael</option><option value='Roma'>Roma</option><option value='Condesa'>Condesa</option><option value='Juaréz'>Juaréz</option>");
    	}else if (orStore == "Benito Juaréz"){
    	    $("#zona").empty().append("<option value='' selected disabled>Selecciona...</option><option value='Xola'>Xola</option><option value='Del Valle'>Del Valle</option><option value='Narvarte'>Narvarte</option>");
    	    
    	}
    });*/
        let url = location.href
	console.log( url )
	if( url.match(/error\=alreadyregistered/g) )
		{setTimeout(() => {
			document.getElementById("loginError").style.opacity = "1"
		}, 200	),
		 setTimeout(() => {
			document.getElementById("loginError").style.opacity = "0"
		}, 3000	)
		}
		else if(url.match(/error\=success/g) )
		{
		    {setTimeout(() => {
			document.getElementById("loginSuccess").style.opacity = "1"
		    }, 200	),
		    setTimeout(() => {
			    document.getElementById("loginSuccess").style.opacity = "0"
		    }, 3000	)
		        
		    }
		}
	/*validar correo regex*/
	function validateEmail(email) {
      var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(email);
    }
    function validate() {
      var $inemail = $("#result"); 
      var email = $("#correo-empleado").val();
    
      if (validateEmail(email)) {
          $inemail.text("");
        $inemail.css("color", "green");
        $inemail.css("font-size", "12px");
        return true;
      } else {
         $inemail.text("correo invalido*");
        $('#result').addClass("d-block text-danger text-weight-bolder");
        setTimeout(() => {
    			document.getElementById("#result").className = 'text-danger text-weight-bolder d-block'
    		}, 200	),
	    setTimeout(() => {
			document.getElementById("#result").className = 'd-none'
		}, 500	)
        return false;
      }
      
    }
    $("#btnCrearEmpleado").on("click", validate);
    </script>
</body>
</html>