<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>..:: Gerenciamento Roteador ::..   Lista de Modelos</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../css/index_modelos.css"> 
    </head>
    <body>
        <header><h1>Lista de Modelos</h1></header>
        <section class="fundo">
            <table class="table" id="minhaTabela">
                <thead>
                    <tr>
                        <th><p>Marca</p></th>
                        <th><p>Modelo</p></th>
                        <th><p>Portas WAN / Gigabit</p></th>
                        <th><p>Portas LAN / Gigabit</p></th>
                        <th><p>2.4Ghz / Padrão</p></th>
                        <th><p>5.8Ghz / Padrão</p></th>
                        <th><p>IPV6</p></th>
                        <th><p>Editar</p></th>
                        <th><p>Remover</p></th>
                    </tr>
                </thead>
                <?php
                include "../../config.php";
                $query = "  SELECT roteadores.*, marcas.marca AS marca FROM roteadores INNER JOIN marcas ON roteadores.marca=marcas.idMarca";
                $resultado = $CONEXAO->query($query);
                if ($resultado) {
                    if ($resultado->num_rows > 0) {
                        while ($linha = $resultado->fetch_assoc()) {
                            if ($linha["wan_gigabit"] == 1) {
                                $wan_gigabit = "Sim";
                            } else {
                                $wan_gigabit = "Não";
                            }
                            if ($linha["lan_gigabit"] == 1) {
                                $lan_gigabit = "Sim";
                            } else {
                                $lan_gigabit = "Não";
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
                            echo "<tr class='text-secondary'>";
                            echo "<td><p>" . $linha["marca"] . "</p></td>";
                            echo "<td><p>" . $linha["modelo"] . "</p></td>";
                            echo "<td><p>" . $linha["qnt_wan"] . " / " . $wan_gigabit . "</p></td>";
                            echo "<td><p>" . $linha["qnt_lan"] . " / " . $lan_gigabit . "</p></td>";
                            echo "<td><p>" . $frequencia_2g . " / " . $linha["padrao_2g"] . "</p></td>";
                            if ($linha["frequencia_5g"] == 1) {
                                echo "<td><p>" . $frequencia_5g . " / " . $linha["padrao_5g"] . "</p></td>";
                            } else {
                                echo "<td><p>" . $frequencia_5g . "</p></td>";
                            }
                            echo "<td><p>" . $ipv6 . "</p></td>";
                            echo "<td><a href='editar.php?id=" . $linha["id"] . "'><img class='icons' src='../img/edit.png'></a></td>";
                            echo "<td><a href='remover.php?id=" . $linha["id"] . "'><img class='icons' src='../img/delete.png'></a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "Nenhum registro encontrado!";
                    }
                } else {
                    die("Erro!");
                }
                $CONEXAO->close();
                ?>
            </table>
            <div class="botoes">
                <a href="inserir.php"><button type = "button" class = "btn btn-primary">Adicionar Modelo</button></a>
                <a href="../index.php"><button type = "button" class = "btn btn-danger">Voltar</button></a>
            </div>
        </section>
    </body>

</html>
<script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#minhaTabela').DataTable({
            "language": {
                "lengthMenu": "Mostrando _MENU_ registros por página",
                "zeroRecords": "Nada encontrado",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "Nenhum registro disponível",
                "infoFiltered": "(filtrado de _MAX_ registros no total)"
            }
        });
    });
</script>