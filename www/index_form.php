<?php
session_start();
include_once "function.php";

$id_carrera = $_SESSION["carrera"];
$anio = $_SESSION["anio"];

// Función para convertir el número de carrera a su representación en texto
function obtenerCarreraTexto($id_carrera) {
    switch ($id_carrera) {
        case 1:
            return "Tec. Administración contable";
        case 2:
            return "Tec. Análisis en Sistemas";
        case 3:
            return "Tec. Laboratorio de Análisis Clínicos";
        case 4:
            return "Tec. Gestión Ambiental y Salud";
        default:
            return "Carrera desconocida";
    }
}

// Función para convertir el número del año a su representación en texto
function obtenerAnioTexto($anio) {
    switch ($anio) {
        case 1:
            return "Primer año";
        case 2:
            return "Segundo año";
        case 3:
            return "Tercer año";
        default:
            return "Año desconocido";
    }
}

$carrera_texto = obtenerCarreraTexto($id_carrera);
$anio_texto = obtenerAnioTexto($anio);
$materias = consulta($id_carrera, $anio);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/index.css">
</head>
<body>
<section class="registro">
    <h3>Resultados</h3>
    <img src="./img/logoisft177.png" alt="I.S.F.T 177">
    <!-- Mostrar el nombre completo de la carrera -->
    <input class="control" type="text" name="carrera" id="carrera" value="<?= htmlspecialchars($carrera_texto) ?>" readonly>
    <!-- Mostrar el año en formato de texto -->
    <input class="control" type="text" name="cursada" id="cursada" value="<?= htmlspecialchars($anio_texto) ?>" readonly>
    <h2>Fecha de Finales</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Materia</th>
                <th>1er llamado</th>
                <th>2do llamado</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($materias as $materia): ?>
            <tr>
                <td><?= htmlspecialchars($materia['nombre_materia']) ?></td>
                <td><?= htmlspecialchars($materia['llamado_1']) ?></td>
                <td><?= htmlspecialchars($materia['llamado_2']) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>
</body>
</html>
