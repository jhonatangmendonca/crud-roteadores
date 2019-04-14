<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>GERÊNCIAMENTO ROTEADORES - MARCA</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="icon" type="imagem/png" href="../../img/smartfood_faveicon.png" />
        <link rel="stylesheet" href="../css/index_marca.css"> 
    </head>
    <body>
        <section class="fundo">
            <header>
                <h1>Lista de Marcas</h1>
            </header>
            <section class="fundo">
                <table class="table">
                    <thead class="table-active">
                        <tr>
                            <th>Marca</th>
                            <th>Editar</th>
                            <th>Remover</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "../../config.php";
                        $query = "SELECT * FROM marcas ORDER BY idmarca;";
                        $resultado = $CONEXAO->query($query);
                        if ($resultado) {
                            if ($resultado->num_rows > 0) {
                                while ($linha = $resultado->fetch_assoc()) {
                                    echo "<tr class='text-secondary'>";
                                    echo "<td><p>" . $linha["marca"] . "</p></td>";
                                    echo "<td><a  class='del' href='editar.php?id=" . $linha["idMarca"] . "'><img class='icons' src='../img/edit.png'></a></td>";
                                    echo "<td><a  class='del' href='remover.php?id=" . $linha["idMarca"] . "'><img class='icons' src='../img/delete.png'></a></td>";
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
                    </tbody>
                </table>
            </section>
            <label>Inserir Marca:</label>
            <form  action="inserir_processa.php" method="post" class="form-inline">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" class="form-control" name="tfCategoria" id="tfCategoria" required="" placeholder="Exemplo: TP-Link" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-outline-success" type="button">Adicionar</button>
                    </div>
                </div>
            </form><a class="btn btn-danger" href='../'>Voltar</a>
        </section>
    </body>
</html>
