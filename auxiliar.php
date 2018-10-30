<?php
function conectar() {
    return new PDO('pgsql:host=localhost; dbname=fa', 'fa', 'fa');
}
?>
