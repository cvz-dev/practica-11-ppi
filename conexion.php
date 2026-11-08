<?php
    $con = mysqli_connect("db", "root", "root_password", "libreria");

    if (mysqli_connect_errno()) {
        die("Failed to connect to MySQL: " . mysqli_connect_error());
    }

    echo "Conexión exitosa a la base de datos libreria";
?>
