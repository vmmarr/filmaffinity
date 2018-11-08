<?php session_start() ?>
<?php
// Crea la cookie
setcookie('acepta', '1', time() + 3600 * 24 * 365, '/', '', false, false);
header('Location: index.php');
?>
