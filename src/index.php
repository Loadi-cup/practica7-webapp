<?php
$host = "db";
$user = "root";
$pass = "rootpass";
$dbname = "practica7";

$conn = null;
for ($i = 0; $i < 10; $i++) {
    try {
        mysqli_report(MYSQLI_REPORT_OFF);
        $conn = new mysqli($host, $user, $pass, $dbname);
        if (!$conn->connect_error) break;
    } catch (Exception $e) {}
    sleep(2);
}

echo "<h1>¡Hola Mundo desde PHP con Docker!</h1>";

if (!$conn || $conn->connect_error) {
    echo "<p style='color:red'>Error de conexión a MySQL.</p>";
} else {
    echo "<p style='color:green'>Conexión a MySQL exitosa. Versión: " . $conn->server_info . "</p>";

    $conn->query("CREATE TABLE IF NOT EXISTS visitas (id INT AUTO_INCREMENT PRIMARY KEY, fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP)");
    $conn->query("INSERT INTO visitas () VALUES ()");
    $res = $conn->query("SELECT COUNT(*) AS total FROM visitas");
    $row = $res->fetch_assoc();
    echo "<p>Número de visitas guardadas en la base de datos: " . $row['total'] . "</p>";
    $conn->close();
}
