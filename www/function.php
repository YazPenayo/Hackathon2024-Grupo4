<?php
function connect(){
    $host = getenv('MYSQL_SERVER');     
    $dbname = getenv('MYSQL_DATABASE');  
    $user = getenv('MYSQL_USER_PASSWORD'); 
    $pass = getenv('MYSQL_ROOT_PASSWORD'); 

    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    try {
        $pdo = new PDO($dsn, $user, $pass, $options);
        return $pdo;
    } catch (PDOException $e) {
        echo "Error en la conexión a la base de datos: " . htmlspecialchars($e->getMessage());
        exit;
    }
}

function consulta($id_carrera, $anio) {
    
    $pdo = connect();
    
    if (!$pdo) {
        echo 'Error al conectar con la base de datos';
        exit;
    }

    $sql = "SELECT * FROM materias WHERE id_carrera = :carrera  AND anio_cursada = :anio_cursada;";

    $stmt = $pdo->prepare($sql);
    if (!$stmt) {
        echo 'Error al preparar la consulta';
        exit;
    }

    $stmt->execute([
        ':carrera' => $id_carrera,
        ':anio_cursada' => $anio
    ]);

    $resultados = $stmt->fetchAll();
    if ($resultados === false) {
        echo 'Error al obtener los resultados';
        exit;
    }
    return $resultados;
}
?>
