<?php
if (isset($_POST['create_table'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "CONCESIONARIO";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("<script>alert('Error de conexión: " . $conn->connect_error . "'); window.location.href = 'index.html';</script>");
    }

    // Verificar si la tabla ya existe
    $table_check = $conn->query("SHOW TABLES LIKE 'AUTO'");
    if ($table_check->num_rows > 0) {
        echo "<script>alert('La tabla AUTO ya existe.'); window.location.href = 'index.html';</script>";
    } else {
        // SQL para crear la tabla AUTO
        $sql = "CREATE TABLE AUTO (
            Placa VARCHAR(6) PRIMARY KEY,
            Marca VARCHAR(15),
            Modelo INT,
            Color VARCHAR(10)
        )";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Tabla AUTO creada exitosamente.'); window.location.href = 'index.html';</script>";
        } else {
            echo "<script>alert('Error al crear la tabla: " . $conn->error . "'); window.location.href = 'index.html';</script>";
        }
    }

    $conn->close();
}
?>
