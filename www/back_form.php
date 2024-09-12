<?php
session_start();
include_once "function.php";

if (isset($_POST['carrera']) && isset($_POST['anio'])) {
    $carrera = $_POST['carrera'];
    $anio = $_POST['anio'];

    $carrera_ids = [
        'contable' => 1,
        'sistemas' => 2,
        'laboratorio' => 3,
        'ambiental' => 4
    ];

    if (!array_key_exists($carrera, $carrera_ids)) {
        echo "Carrera no válida.";
        exit;
    }
    
    $id_carrera = $carrera_ids[$carrera];
    $_SESSION["carrera"]=$id_carrera;
    $_SESSION["anio"]=$anio;
    $materias = consulta($id_carrera, $anio);


    header("Location: index_form.php");
    exit();
} else {
    echo "No se enviaron los datos necesarios.";
    exit;
}
?>
