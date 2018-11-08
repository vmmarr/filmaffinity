<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Modificar una pelicula</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
        <?php
        require '../comunes/auxiliar.php';


        try {
            $error = [];
            $id = comprobarId();
            $pdo = conectar();
            $fila = comprobarPelicula($pdo, $id);
            comprobarParametros(PAR);
            $valores = array_map('trim', $_POST);
            $flt['titulo'] = comprobarTitulo($error);
            $flt['anyo'] = comprobarAnyo($error);
            $flt['sinopsis'] = trim(filter_input(INPUT_POST, 'sinopsis'));
            $flt['duracion'] = comprobarDuracion($error);
            $flt['genero_id'] = comprobarGeneroId($pdo, $error);
            comprobarErrores($error);
            modificarPelicula($pdo, $flt, $id);
            header('Location: index.php');
        } catch (EmptyParamException|ValidationException $e) {
            // No hago nada
        } catch (ParamException $e) {
            header('Location: index.php');
        }
        ?>
        <div class="container">
            <?php mostrarFormulario($fila, $error, $pdo, 'Modificar'); ?>
        </div>
    </body>
</html>
