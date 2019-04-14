<?php
$id = $_GET["id"];
include "../../config.php";
$query = "DELETE FROM roteadores WHERE id=" . $id . ";";
$resultado = $CONEXAO->query($query);
$CONEXAO->close();
if ($resultado) {
    header("location:index.php");
} else {
    echo "ERRO!!!";
}




