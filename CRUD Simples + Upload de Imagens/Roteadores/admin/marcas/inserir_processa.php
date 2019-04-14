<?php

//Capturar valores do formulÃ¡rio
$categoria = $_POST["tfCategoria"];
include "../../config.php";
$query = "INSERT INTO marcas(marca) VALUES('" . $categoria . "');";
$resultado = $CONEXAO->query($query);
$CONEXAO->close();
if ($resultado) {
    
} else {
    die("Deu errado!");
}
header("location:index.php");
?>
