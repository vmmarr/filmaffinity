<?php
function conectar() {
    return new PDO('pgsql:host=localhost; dbname=fa', 'fa', 'fa');
}

function buscarPelicula($id, $pdo) {
    $st = $pdo->prepare('SELECT * FROM peliculas WHERE id = :id');
    $st->execute([':id' => $id]);
    return $st->fetch();
}
?>
