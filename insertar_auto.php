<?php
if (isset($_POST['insert_auto'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "CONCESIONARIO";

    $placa = $_POST['placa'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $color = $_POST['color'];

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("<script>alert('Error de conexión: " . $conn->connect_error . "'); window.location.href = 'index.html';</script>");
    }

    // Verificar si ya existe un registro con esa placa
    $plate_check = $conn->query("SELECT * FROM AUTO WHERE Placa='$placa'");
    if ($plate_check->num_rows > 0) {
        echo "<script>alert('Ya existe un auto registrado con esa placa.'); window.location.href = 'index.html';</script>";
    } else {
        // SQL para insertar datos en la tabla AUTO
        $sql = "INSERT INTO AUTO (Placa, Marca, Modelo, Color) VALUES ('$placa', '$marca', $modelo, '$color')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Registro insertado exitosamente en la tabla AUTO.'); window.location.href = 'index.html';</script>";
        } else {
            echo "<script>alert('Error al insertar el registro: " . $conn->error . "'); window.location.href = 'index.html';</script>";
        }
    }

    $conn->close();
}
?>
