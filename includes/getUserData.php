<?php
    include_once("db.php");
    $id = $_POST["id"];
    $data = array();
    //var_dump($_POST);
    $Query = "SELECT t1.*,t2.*,t1.ID as ID1, t2.ID as ID2 FROM valid035_users t1 LEFT JOIN valid035_test2b t2 ON t1.ID = t2.employee WHERE t1.ID = '$id'";

    $result = $db->query($Query);

    if($row = $result->fetch()){
        for($i=1;$i<=74;$i++){
            $indice= "p$i";
            $data[] = utf8_decode($row[$indice]);
        }
        $nestedData[] = array("id" => $row['ID1'],
                            "nombre" => utf8_encode($row['nombre'] . " " . $row['apellido'] ),
                            "preguntas" => $data);
        //$data[] = $nestedData;
        echo json_encode($nestedData);
    }
    else{
        echo json_encode("Error en query" . " " . $Query);
    }
?>