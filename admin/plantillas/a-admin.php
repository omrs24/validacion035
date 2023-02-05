<div class="row d-flex justify-content-center contenedor-titulo mt-2">
        <div class="col">
            <i class="fas fa-user"></i>&nbsp;&nbsp;Añadir Administrador
        </div>
    </div>
    <hr>
    <div class="container mt-3">
        <h3>Datos Generales</h3>
        <div class="row mt-3">
            <div class="col-lg-5 d-flex-left">
                <div class="input-group-prepend">
                    <span class="input-group-text form-control mr-3 d-sm-none">Nombre</span>
                </div>
                <div class="input-group input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text d-none d-sm-block">Nombre</span>
                    </div>
                    <input type="text" placeholder="Nombre" name="nombre-admin" id="nombre-admin" class="form-control mr-3">
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-5 d-flex-left">
                <div class="input-group-prepend">
                    <span class="input-group-text form-control mr-3 d-sm-none">Apellido Paterno</span>
                </div>
                <div class="input-group input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text d-none d-sm-block">Apellido Paterno</span>
                    </div>
                    <input type="text" placeholder="Apellido Paterno" name="apellido-paterno-admin" id="apellido-paterno-admin" class="form-control mr-3">
                </div>
            </div>
            <div class="col-lg-5 d-flex-left">
                <div class="input-group-prepend">
                    <span class="input-group-text form-control mr-3 d-sm-none">Apellido Materno</span>
                </div>
                <div class="input-group input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text d-none d-sm-block">Apellido Materno</span>
                    </div>
                    <input type="text" placeholder="Apellido Materno" name="apellido-materno-admin" id="apellido-materno-admin" class="form-control mr-3">
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-5 d-flex-left">
                <div class="input-group-prepend">
                    <span class="input-group-text form-control mr-3 d-sm-none">Correo</span>
                </div>
                <div class="input-group input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text d-none d-sm-block">Correo</span>
                    </div>
                    <input type="text" placeholder="Correo" name="correo-admin" id="correo-admin" class="form-control mr-3">
                </div>
            </div>
            <div class="col-lg-5 d-flex-left">
                <div class="input-group-prepend">
                    <span class="input-group-text form-control mr-3 d-sm-none">RFC O CURP</span>
                </div>
                <div class="input-group input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text d-none d-sm-block">RFC O CURP</span>
                    </div>
                    <input type="text" placeholder="RFC O CURP" name="rfcocurp-admin" id="rfcocurp-admin" class="form-control mr-3 pwd1">
                    <div class="input-group-append">
                        <!--<button class="btn btn-outline-secondary mr-3 showpass1" type="button"><i class="fas fa-eye"></i></button>
                        icon-eye-close-->
                    </div>
                </div>
            </div>
        </div>
        <!--password inputs-->
        <div class="row mt-3">
            <div class="col-lg-5 d-flex-left">
                <div class="input-group-prepend">
                    <span class="input-group-text form-control mr-3 d-sm-none">Compa&ntilde;&iacute;a</span>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text d-none d-sm-block">Compa&ntilde;&iacute;a</span>
                    </div>
                    <select class="form-control mr-3" id="ddlcompaniaadmin" name="ddlcompaniaadmin">
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
            <div class="col-lg-5 d-flex-left">
                <div class="input-group-prepend">
                    <span class="input-group-text form-control mr-3 d-sm-none">Sucursal</span>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text d-none d-sm-block">Sucursal</span>
                    </div>
                    <select class="form-control mr-3" id="ddlsucursaladmin" name="ddlsucursaladmin">
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
        <?php
            //Le da el poder de crear nuevos super admins validando que sea uno
            if($_SESSION['sadmin'] == 0)
            {
            ?>
            <div class="row mt-3">
                <div class="col-lg-5 d-flex-left">
                    <div class="form-check m-4">
                        <input type="checkbox" class="form-check-input" id="sadmin" name="sadmin">
                        <label class="form-check-label" for="exampleCheck1">Es super admin</label>
                      </div>
                </div>
            </div>
            <?php
            }
            ?>
        <!--botones-->
        <div class="row mt-3 justify-content-around">
            <div class="col-1 m-3 d-flex-left">
                <input type="button" class="btn btn-secondary" value="Cancelar">
            </div>
            <div class="col-1 m-3 d-flex-left">
                <input type="submit" class="btn btn-primary" id="btnCrearAdmin" value="Crear">
            </div>
        </div>
        <br>
        <h3>Administradores</h3>
        <div class="row mt-5 mb-5">
            <div class="col-md-9">
                <table class="table table-sm table-striped table-bordered" id="dtAdmins">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Correo</th>
                            <th>RFC O CURP</th>
                            <th>Compa&ntilde;&iacute;a</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $query = "SELECT t1.nombre,t1.apellido,t1.correo,t1.RFCURP,t2.nombre cnombre FROM valid035_users t1 LEFT JOIN valid035_companies t2 ON t1.compania = t2.ID WHERE t1.activo = 'Y' AND t1.admin = 1 AND t1.sadmin = 0";
                        $result = $db->query($query);
                        while($row = $result->fetch()){
                            $body = "<tr>
                                        <td>
                                            $row[nombre]
                                        </td>
                                        <td>
                                            $row[apellido]
                                        </td>
                                        <td>
                                            $row[correo]
                                        </td>
                                        <td>
                                            $row[RFCURP]
                                        </td>
                                        <td>
                                            $row[cnombre]
                                        </td>
                                    </tr>"; 
                            echo $body;
                        }
                    ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
