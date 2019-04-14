<?php
$nome = $_POST["nome"];
$id = $_POST["idCategoria"];
include "../../config.php";
$query = "UPDATE marcas SET marca='" . $nome . "' WHERE idMarca=" . $id . ";";
$resultado = $CONEXAO->query($query);

if (isset($resultado)) {

    header("location:index.php");
} else {
    die("Erro!");
}
$CONEXAO->close();