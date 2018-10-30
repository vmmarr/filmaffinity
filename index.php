<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Bases de datos</title>
    </head>
    <body>
        <?php

        // De este modo no se puede hacer porque produce un error de inyeccion
        $buscarTitulo = isset($_GET['buscarTitulo']) ? trim($_GET['buscarTitulo']) : '';
        $pdo = new PDO('pgsql:host=localhost; dbname=fa', 'fa', 'fa');
        // $st = $pdo->query('SELECT * FROM peliculas;');
        // :titulo es un marcador
        $st = $pdo->prepare("SELECT p.*, genero FROM peliculas p
                            JOIN generos g ON genero_id = g.id
                            WHERE position(lower(:titulo) in lower(titulo)) != 0");
        $st->execute([':titulo' => "$buscarTitulo"]);
        // $res = $st->fetchAll(); El objeto pdo ya se puede recorrer
        ?>

        <div>
            <fieldset>
                <legend>Buscar...</legend>
                <form  action="" method="get">
                    <label for="buscarTitulo">Buscar por titulo:</label>
                    <input type="text" id="buscarTitulo" name="buscarTitulo"
                            value="<?= $buscarTitulo ?>">
                    <input type="submit" value="Buscar">
                </form>
            </fieldset>
        </div>

        <div style="margin-top: 20px">
            <table border="1" style="margin:auto">
                <thead>
                    <th>Titulo</th>
                    <th>Año</th>
                    <th>Sinopsis</th>
                    <th>Duracion</th>
                    <th>Género</th>
                </thead>
                <tbody>
                    <?php foreach ($st as $fila) { ?>
                        <tr>
                            <td><?= $fila['titulo'] ?></td>
                            <td><?= $fila['anyo'] ?></td>
                            <td><?= $fila['sinopsis'] ?></td>
                            <td><?= $fila['duracion'] ?></td>
                            <td><?= $fila['genero'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </body>
</html>
