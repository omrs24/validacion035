<?php
    
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
    
    if($_SESSION["authenticated_user"] == true) {
        if($_SESSION['role'] != 1)
        {
            header("Location: demo.php");    
        }
        else
        {
            header("Location: admin/dashboard.php");
        }
    }
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
			background: #c0392b !important;
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
                       <a href="#">Guía informativa</a>
                   </li>                   
               </ul>
            </nav>
        </div>
    </header>
    
        <div class="container">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card shadow-lg mt-5">
					<!--<div class="brand_logo_container">
						<img src="img/formlogo.png" class="brand_logo" alt="Logo">
					</div>-->
				<div class="d-flex justify-content-center form_container">
					<form method="POST" action="includes/process_login.php">
					    <p class="font-weight-bold">Ingrese su correo electronico: </p><br>
						<div class="input-group mb-3">
							<!--<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>-->
							<input type="text" id="username" name="username" class="form-control input_user" value="" placeholder="correo">
						</div>
						<div class="input-group mb-5">
							<!--<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>-->
							<!--<input type="password" id="password" name="password" class="form-control input_pass" value="" placeholder="password">-->
						</div>
						<div class="form-group d-none">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="customControlInline">
								<label class="custom-control-label" for="customControlInline">Remember me</label>
							</div>
						</div>
						<div class="d-flex justify-content-center mt-3 login_container">
							<input type="submit" value="Ingresar" class="btn login_btn">
						</div>
					</form>
				</div>
		
				<div class="mt-4 d-none">
					<div class="d-flex justify-content-center links">
						Don't have an account? <a href="#" class="ml-2">Sign Up</a>
					</div>
					<div class="d-flex justify-content-center links">
						<a href="#">Forgot your password?</a>
					</div>
				</div>
			</div>
		</div>
	</div>
    
    <footer class="footer">
        <div class="contenedor">
            Footer
        </div>
    </footer>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>