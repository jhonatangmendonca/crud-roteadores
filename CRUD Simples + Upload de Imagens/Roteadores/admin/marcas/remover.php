<?php
$id = $_GET["id"];
include "../../config.php";
$query = "DELETE FROM marcas WHERE idMarca=" . $id . ";";
$resultado = $CONEXAO->query($query);
$CONEXAO->close();
if ($resultado) {
    header("location:index.php");
} else {
    echo "Erro!!!";
}




