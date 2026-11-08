<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librería - Registro</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Librería</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="registro.php">Registro</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="consulta.php">Consulta</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container mt-4">
        <h1>Registro de libros</h1>

        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $con = mysqli_connect("db", "root", "root_password", "libreria");

                if (mysqli_connect_errno()) {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }

                $autor = mysqli_real_escape_string($con, $_POST["autor"]);
                $titulo = mysqli_real_escape_string($con, $_POST["titulo"]);
                $fecha = mysqli_real_escape_string($con, $_POST["fecha"]);

                $sql = "INSERT INTO libros (autor, titulo, fecha_publicacion)
                    VALUES ('$autor', '$titulo', '$fecha');";

                if (!mysqli_query($con, $sql)) {
                    echo "<p>Error: " . mysqli_error($con) . "</p>";
                } else {
                    echo "<p>El libro se ha registrado correctamente.</p>";
                }

                mysqli_close($con);
            }
        ?>

        <form action="registro.php" method="post">
            <div class="mb-3">
                <label for="autor" class="form-label">Autor:</label>
                <input type="text" class="form-control" id="autor" name="autor" required>
            </div>
            <div class="mb-3">
                <label for="titulo" class="form-label">Título:</label>
                <input type="text" class="form-control" id="titulo" name="titulo" required>
            </div>
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha de publicación:</label>
                <input type="date" class="form-control" id="fecha" name="fecha" required>
            </div>
            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
    </main>
</body>
</html>
