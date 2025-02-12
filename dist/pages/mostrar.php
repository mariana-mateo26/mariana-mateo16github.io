<?php
include '../../conectar.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Gestión de Usuarios</h1>

        <!-- Formulario para agregar usuario -->
        <form action="crud.php" method="POST" class="mb-4">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" name="username" class="form-control" placeholder="Nombre de usuario" required>
                </div>
                <div class="col-md-4">
                    <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                </div>
                <div class="col-md-4">
                    <button type="submit" name="agregar" class="btn btn-primary">Agregar</button>
                </div>
            </div>
        </form>

        <!-- Mostrar usuarios -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre de usuario</th>
                    <th>Contraseña</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM users";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>
                        <td>" . htmlspecialchars($row['id']) . "</td>
                        <td>" . htmlspecialchars($row['username']) . "</td>
                        <td>" . htmlspecialchars($row['password']) . "</td>
                        <td>
                            <a href='editar.php?id=" . htmlspecialchars($row['id']) . "' class='btn btn-warning btn-sm'>Editar</a>
                            <a href='crud.php?eliminar=" . htmlspecialchars($row['id']) . "' class='btn btn-danger btn-sm'>Eliminar</a>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>



