<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librería - Consulta</title>

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
                        <a class="nav-link" href="registro.php">Registro</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="consulta.php">Consulta</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container mt-4">
        <h1>Consulta de libros</h1>

        <table class="table">
            <tr>
                <th>id</th>
                <th>Autor</th>
                <th>Título</th>
                <th>Fecha de publicación</th>
                <th>Portada</th>
            </tr>
            <?php
                $con = mysqli_connect("db", "root", "root_password", "libreria");

                if (mysqli_connect_errno()) {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }

                $sql = "SELECT id, autor, titulo, fecha_publicacion, portada FROM libros;";
                $resultado = mysqli_query($con, $sql);

                while ($row = mysqli_fetch_array($resultado)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . htmlspecialchars($row['autor']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['titulo']) . "</td>";
                    echo "<td>" . $row['fecha_publicacion'] . "</td>";
                    echo "<td><img src='data:image/jpeg;base64," . base64_encode($row['portada']) . "' width='100'></td>";
                    echo "</tr>";
                }

                mysqli_close($con);
            ?>
        </table>
    </main>
</body>
</html>
