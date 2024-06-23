<?php

var_dump($_POST);

$valor = $_POST['telefono-principal'] + 2000;

echo "<br>";
echo "<strong>Nombre completo: </strong> {$_POST['nombre-completo']}";
echo "<br>";
echo "<strong>Teléfono: </strong> $valor";

?>