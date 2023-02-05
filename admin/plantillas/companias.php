<div class="row d-flex justify-content-center contenedor-titulo mt-2">
    <div class="col">
        <i class="fas fa-building"></i>&nbsp;&nbsp;Compa&ntilde;&iacute;as
    </div>
</div>
<hr>
<div class="container mt-3">
    <h3>Registrar compa&ntilde;&iacute;a</h3>
        <div class="row mt-3">
            <div class="col-lg-8 d-flex-left">
                <div class="input-group-prepend">
                    <span class="input-group-text form-control mr-3 d-sm-none">Nombre de la compa&ntilde;&iacute;a</span>
                </div>
                <div class="input-group input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text d-none d-sm-block">Nombre de la compa&ntilde;&iacute;a</span>
                    </div>
                    <input type="text" placeholder="Nombre de la compa&ntilde;&iacute;a" name="crearcompania" id="crearcompania" class="form-control mr-3">
                </div>
            </div>
        </div>
        <!--botones-->
        <div class="row mt-3 justify-content-around">
            <div class="col-1 m-3 d-flex-left">
                <input type="button" class="btn btn-secondary" value="Cancelar">
            </div>
            <div class="col-1 m-3 d-flex-left">
                <?php
                if($_SESSION["sadmin"]==1)
                {
                    ?>
                    <input type="submit" class="btn btn-primary" id="btnCrearCompania" value="Crear">
                    <?php
                }
                else
                {
                ?>
                    <input type="submit" class="btn btn-primary" disabled id="btnCrearCompania" value="Crear">
                <?php
                }
                ?>
                
            </div>
        </div>
    <h3>Registrar Sucursal</h3>
        <div class="row mt-3">
            <div class="col-lg-8 d-flex-left">
                <div class="input-group-prepend">
                    <span class="input-group-text form-control mr-3 d-sm-none">Nombre de la sucursal</span>
                </div>
                <div class="input-group input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text d-none d-sm-block">Nombre de la sucursal</span>
                    </div>
                    <input type="text" placeholder="Nombre de la sucursal" name="crearsucursal" id="crearsucursal" class="form-control mr-3">
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-8 d-flex-left">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text form-control mr-3 d-sm-none">Compa&ntilde;&iacute;a</span>
                    </div>
                    <div class="input-group-prepend">
                        <span class="input-group-text d-none d-sm-block">Compa&ntilde;&iacute;a</span>
                    </div>
                    <select class="form-control mr-3" id="ddlcompaniasucursal" name="ddlcompaniasucursal">
                        <option value="" disabled selected>Selecciona...</option>
                    	<?php
                    	
            			if($_SESSION['sadmin'] == 1)
            			{
            			    $myQuery = $db->query("SELECT ID, CONCAT(nombre, ' (', ID, ')') nombre FROM valid035_companies ORDER BY nombre");   
            			}
            			else 
            			{
            			    $myQuery = $db->query("SELECT ID, CONCAT(nombre, ' (', ID, ')') nombre FROM valid035_companies WHERE ID = '$_SESSION[compania]' ORDER BY nombre");
            			    
            			}
            			while($row = $myQuery->fetch()){			
            				echo "<option value='".$row["ID"]."'>".$row["nombre"]."</option>";
            			};
            			?>
                    </select>
                </div>
            </div>
        </div>
        <!--botones-->
        <div class="row mt-3 justify-content-around">
            <div class="col-1 m-3 d-flex-left">
                <input type="button" class="btn btn-secondary" value="Cancelar">
            </div>
            <div class="col-1 m-3 d-flex-left">
                <input type="submit" class="btn btn-primary" id="btnCrearSucursal" value="Crear">
            </div>
        </div>
</div>