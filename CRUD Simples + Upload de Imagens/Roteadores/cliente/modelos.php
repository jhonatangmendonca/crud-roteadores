<?php
$cat = $_GET['Id'];
include "../config.php";
//Mostra todos o nome daquela determinada categoria que foi selecionada.
$query = "SELECT * FROM marcas WHERE idMarca = '$cat'";
$resultado = $CONEXAO->query($query);
if ($resultado) {
    if ($resultado->num_rows > 0) {
        while ($linha = $resultado->fetch_assoc()) {
            echo "<h3>" . "Roteadores - " . $linha["marca"] . "</h3>";
        }
    } else {
        echo "<h3>Nenhum registro encontrado!</h3>";
    }
} else {
    die("Erro!");
}

$CONEXAO->close();
?>

<div class="container">
    <div class="card">
        <div class="card-body">
            <?php
            $cat = $_GET['Id'];
            include "../config.php";
            //Vai mostrar todas as categorias, ordenadas por ordem alfabética.
            $query = "SELECT * FROM roteadores WHERE marca='$cat' ORDER BY modelo;";
            $resultado = $CONEXAO->query($query);
            if ($resultado) {
                if ($resultado->num_rows > 0) {
                    while ($linha = $resultado->fetch_assoc()) {
                        echo '<div class="card">';
                        echo '<div class="card-body">';
                        //ao clicar em alguma categoria, vai ser redirecionado para a página de produtos daquela determinada categoria, mandando o ID da categoria como parametro.
                        echo "<a href=pesquisar-roteador.php?Id=" . $linha["id"] . ">" . $linha["modelo"] . "</a>";
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo "<h1>Nenhum registro encontrado!</h1>";
                }
            } else {
                die("Erro!");
            }
            $CONEXAO->close();
            ?>    
        </div>
    </div>
</div>