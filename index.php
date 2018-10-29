<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Bases de datos</title>
    </head>
    <body>
        <?php
        $buscarTitulo = isset($_GET['buscarTitulo']) ? trim($_GET['buscarTitulo']) : '';
        $pdo = new PDO('pgsql:host=localhost; dbname=fa', 'fa', 'fa');
        // $st = $pdo->query('SELECT * FROM peliculas;');
        $st = $pdo->query("SELECT * FROM peliculas WHERE titulo ILIKE '%$buscarTitulo%'");
        // $res = $st->fetchAll(); El objeto pdo ya se puede recorrer
        ?>

        <div>
            <fieldset>
                <legend>Buscar...</legend>
                <form  action="" method="get">
                    <label for="buscarTitulo">Buscar por titulo:</label>
                    <input type="text" id="buscarTitulo" name="buscarTitulo" value="<?= $buscarTitulo ?>">
                    <input type="submit" value="Buscar">
                </form>
            </fieldset>
        </div>

        <div style="margin-top: 20px">
            <table border="1" style="margin:auto">
                <thead>
                    <th>Id</th>
                    <th>Titulo</th>
                    <th>Año</th>
                    <th>Sinopsis</th>
                    <th>Duracion</th>
                    <th>Género</th>
                </thead>
                <tbody>
                    <?php foreach ($st as $fila) { ?>
                        <tr>
                            <td><?= $fila['id'] ?></td>
                            <td><?= $fila['titulo'] ?></td>
                            <td><?= $fila['anyo'] ?></td>
                            <td><?= $fila['sinopsis'] ?></td>
                            <td><?= $fila['duracion'] ?></td>
                            <td><?= $fila['genero_id'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </body>
</html>
