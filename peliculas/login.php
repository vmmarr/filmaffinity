<?php session_start() ?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Iniciar sesion</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
        <?php
        require '../comunes/auxiliar.php';

        const PAR_LOGIN = ['login' => '', 'password' => ''];
        $valores = PAR_LOGIN;
        
        try {
            $error = [];
            $pdo = conectar();
            comprobarParametros(PAR);
            $valores = array_map('trim', $_POST);
            $flt['titulo'] = comprobarTitulo($error);
            $flt['anyo'] = comprobarAnyo($error);
            $flt['sinopsis'] = trim(filter_input(INPUT_POST, 'sinopsis'));
            $flt['duracion'] = comprobarDuracion($error);
            $flt['genero_id'] = comprobarGeneroId($pdo, $error);
            comprobarErrores($error);
            insertarPelicula($pdo, $flt);
            header('Location: index.php');
        } catch (EmptyParamException|ValidationException $e) {
            // No hago nada
        } catch (ParamException $e) {
            header('Location: index.php');
        }
        ?>
        <div class="container">
            <div class="row">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="login">Usuario:</label>
                        <input type="text" name="login" value="">
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña:</label>
                        <input type="text" name="password" value="">
                    </div>
                    <button type="submit" class="btn btn-default">Iniciar section</button>
                </form>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>
