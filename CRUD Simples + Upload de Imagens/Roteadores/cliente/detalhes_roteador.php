<!DOCTYPE html>
<html>
    <head>
        <title>Especificações</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link rel="stylesheet" type="text/css" href="css/detalhes_roteador.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
          <header>
           <div class="alert alert-success"><h3>Especificações</h3></div>
           </header>
            <div class="fundo">
                <?php
                $cat = $_GET['Id'];
                include "../config.php";
                $query = "  SELECT roteadores.*, marcas.marca AS marca FROM roteadores INNER JOIN marcas ON roteadores.marca=marcas.idMarca WHERE id='$cat'";
                $resultado = $CONEXAO->query($query);
                if ($resultado) {
                    if ($resultado->num_rows > 0) {
                        while ($linha = $resultado->fetch_assoc()) {
                            if ($linha["wan_gigabit"] == 1) {
                                $wan_gigabit = "10/100/1000";
                            } else {
                                $wan_gigabit = "10/100";
                            }
                            if ($linha["lan_gigabit"] == 1) {
                                $lan_gigabit = "10/100/1000";
                            } else {
                                $lan_gigabit = "10/100";
                            }
                            if ($linha["frequencia_2g"] == 1) {
                                $frequencia_2g = "Sim";
                            } else {
                                $frequencia_2g = "Não";
                            }
                            if ($linha["frequencia_5g"] == 1) {
                                $frequencia_5g = "Sim";
                            } else {
                                $frequencia_5g = "Não";
                            }
                            if ($linha["ipv6"] == 1) {
                                $ipv6 = "Sim";
                            } else {
                                $ipv6 = "Não";
                            }
                            echo '<div class="img_roteador">';
                            echo "<img class='img_router' src='../admin/$UPLOAD_DIRECTORY/" . $linha["src"] . "' alt='" . $linha["src"] . "'/>";
                            echo '</div>';
                            echo '<div class="descri_roteador">';
                            echo '<div class="alert alert-primary detalhes">';
                            echo '<p class="detalhes">' . "Marca: " . $linha["marca"] . '</p>';
                            echo '</div>';
                            echo '<div class="alert alert-primary detalhes">';
                            echo '<p class="detalhes">' . "Modelo: " . $linha["modelo"] . '</p>';
                            echo '</div>';
                            echo '<div class="alert alert-primary detalhes">';
                            echo '<p class="detalhes">' . "Quantidade de Portas WAN: " . $linha["qnt_wan"] . " - " . $wan_gigabit . '</p>';
                            echo '</div>';
                            echo '<div class="alert alert-primary detalhes">';
                            echo '<p class="detalhes">' . "Quantidade de Portas LAN: " . $linha["qnt_lan"] . " - " . $lan_gigabit . '</p>';
                            echo '</div>';
                            echo '<div class="alert alert-primary detalhes">';
                            echo '<p class="detalhes">' . "Frequência 2.4Ghz: " . $frequencia_2g . '</p>';
                            echo '<p class="detalhes">' . "Padrão: " . $linha["padrao_2g"] . "</p>";
                            echo '</div>';
                            if ($frequencia_5g == "Sim") {
                                echo '<div class="alert alert-primary detalhes">';
                                echo '<p class="detalhes">' . "Frequência 5.8Ghz: " . $frequencia_5g . '</p>';
                                echo '<p class="detalhes">' . "Padrão: " . $linha["padrao_5g"] . '</p>';
                                echo '</div>';
                            } else {
                                echo '<div class="alert alert-danger detalhes">';
                                echo '<p class="detalhes">' . "Frequência 5.8Ghz: " . $frequencia_5g . '</p>';
                                echo '</div>';
                            }
                            if ($ipv6 == "Sim") {
                                echo '<div class="alert alert-primary detalhes">';
                                echo '<p class="detalhes">' . "Suporte IPV6: " . $ipv6 . '</p>';
                                echo '</div>';
                            } else {
                                echo '<div class="alert alert-danger detalhes">';
                                echo '<p class="detalhes">' . "Suporte IPV6: " . $ipv6 . '</p>';
                                echo '</div>';
                                echo '</div>';
                            }
                        }
                    } else {
                        echo '<div class="alert alert-danger detalhes">';
                        echo "<p>" . "Não há roteadores cadastrados!!!" . "</p>";
                        echo '</div>';
                    }
                } else {
                    die("Erro!");
                }
                $CONEXAO->close();
                ?>
                
            <a class="voltar" href="index.php"><button type="button" class="btn btn-danger">Voltar</button></a>
            </div>
    </body>
   
</html>