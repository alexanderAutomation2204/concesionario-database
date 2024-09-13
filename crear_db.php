<?php
if (isset($_POST['create_db'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password);

    // Verificar conexión
    if ($conn->connect_error) {
        die("<script>alert('Error de conexión: " . $conn->connect_error . "'); window.location.href = 'index.html';</script>");
    }

    // Verificar si la base de datos ya existe
    $db_check = $conn->query("SHOW DATABASES LIKE 'CONCESIONARIO'");
    if ($db_check->num_rows > 0) {
        echo "<script>alert('La base de datos ya existe.'); window.location.href = 'index.html';</script>";
    } else {
        // Crear base de datos
        $sql = "CREATE DATABASE CONCESIONARIO";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Base de datos creada exitosamente.'); window.location.href = 'index.html';</script>";
        } else {
            echo "<script>alert('Error al crear la base de datos: " . $conn->error . "'); window.location.href = 'index.html';</script>";
        }
    }

    $conn->close();
}
?>
