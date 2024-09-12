<?php
include_once "function.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Inscripción</title>
    <link rel="stylesheet" href="./css/index_form.css">
</head>
<body>
    <div class="form-container">
        <h1>Formulario de Inscripción</h1>
        <img src="/img/logoisft177.png" alt="Imagen descriptiva">
        <form action="back_form.php" method="POST">
            <label for="anio" >Año de Cursada:</label>
            <select id="anio" name="anio" required >
                <option value="1">Primer año</option>
                <option value="2">Segundo año</option>
                <option value="3">Tercer año</option>
            </select>
            
            <label for="carrera">Carrera:</label>
            <select id="carrera" name="carrera" required>
                <option value="contable">Tec.Administración contable</option>
                <option value="sistemas">Tec.Análisis en Sistemas</option>
                <option value="laboratorio">Tec.Laboratotio de Análisis Clínicos</option>
                <option value="ambiental">Tec.Gestion Ambiental y Salud</option>
            </select>

            <input type="submit" value="Enviar">
        </form>
    </div>
</body>
</html>
