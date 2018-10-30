<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Confirmar borrado</title>
    </head>
    <body>
        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            header('Location: index.php');
        }
        ?>
        <h3>¿Seguro que deseas borrar la fila?</h3>

        <form action="index.php" method="post">
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="submit" value="Si">
        </form>

        <form action="index.php" method="get">
            <input type="submit" value="No">
        </form>
    </body>
</html>
