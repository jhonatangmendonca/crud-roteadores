<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CRUD - UPLOAD IMAGENS</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="css/index.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body>
        <div class="fundo">
            <header class="header">
                <h3>CRUD Simples + Upload de Imagens</h3>
            </header>
            <main class="main">
                <?php
                include "../config.php";
                $query = "  SELECT roteadores.*, marcas.marca AS marca FROM roteadores INNER JOIN marcas ON roteadores.marca=marcas.idMarca";
                $resultado = $CONEXAO->query($query);
                if ($resultado) {
                    if ($resultado->num_rows > 0) {
                        while ($linha = $resultado->fetch_assoc()) {
                            echo '<a href=detalhes_roteador.php?Id='.$linha["id"].'>';
                            echo '<div class="marca">';
                            echo '<div class="img_roteador">';
                            echo "<img class='img_router' src='../admin/$UPLOAD_DIRECTORY/" . $linha["src"] . "' alt='" . $linha["src"] . "'/>";
                            echo '</div>';
                            echo '<div class="desc_roteador">';
                            echo "<p>" . $linha["marca"]  ." ". $linha["modelo"] . "</p>";
                            echo '</div>';
                            echo '</div>';
                            echo '</a>';
                        }
                    } else {
                        echo "<h1>Nenhum registro encontrado!</h1>";
                    }
                } else {
                    die("Erro!");
                }
                $CONEXAO->close();
                ?> 
            </main>
        </div>
        <footer class="footer">Criado por Jhonatan Gomes</footer>
    </body>
</html>


