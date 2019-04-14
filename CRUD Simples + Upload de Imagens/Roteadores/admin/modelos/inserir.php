<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>..:: Gerenciamento Roteador ::..   Cadastro de Modelos</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/cadastro_modelo.css">
    </head>
    <body>
        <div class="fundo">
            <header><h1>Cadastro de Modelos</h1></header>
        <form  enctype="multipart/form-data" action="inserir_processa.php" method="POST">
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <?php
                        if (isset($_GET['roteador-duplicado']) && empty($_GET['roteador-duplicado'])) {
                            echo '<div class="alert alert-danger" role="alert">
         Roteador já cadastrado!
        </div> ';
                        }
                        if (isset($_GET['roteador-salvo']) && empty($_GET['roteador-salvo'])) {
                            echo '<div class="alert alert-success" role="alert">
          Roteador cadastrado com sucesso!
        </div> ';
                        }
                        ?>
                        <div class = "form-row">
                            <div class = "form-group col-md-6">
                                <label for = "marca">Marca do roteador</label>
                                <select class = "form-control" name = "marca" id = "marca">
                                    <?php
                                    include "../../config.php";
                                    $query = "SELECT * FROM marcas;";
                                    $resultado = $CONEXAO->query($query);
                                    if ($resultado) {
                                        if ($resultado->num_rows > 0) {

                                            while ($linha = $resultado->fetch_assoc()) {

                                                echo "<option value='" . $linha["idMarca"] . "'>" . $linha["marca"] . "</option>";
                                            }
                                        } else {
                                            echo "Nenhuma Categoria Encontrada!";
                                        }
                                    } else {
                                        die("Erro!");
                                    }
                                    $CONEXAO->close();
                                    ?>
                                </select>
                            </div>
                            <div class = "form-group col-md-6">
                                <label for = "modelo">Modelo</label>
                                <input class = "form-control" name = "modelo" id = "modelo" type = "text" required="">
                            </div>
                            <div class = "form-group col-md-6">
                                <label for = "qtd_wan_label">Quantidade WAN</label>
                                <select class = "form-control" name = "qtd_wan" id = "qtd_wan">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                                <label for = "wan_giga">Gigabit?</label>
                                <input type = "checkbox" value = "1" name = "wan_giga" id = "wan_giga">
                                <label for = "defaultCheck1">
                                    Sim
                                </label>
                            </div>
                            <div class = "form-group col-md-6">
                                <label for = "qtd_lan_label">Quantidade LAN</label>
                                <select class = "form-control" name = "qtd_lan" id = "qtd_lan">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                </select>
                                <label for = "lan_giga">Gigabit?</label>
                                <input type = "checkbox" value = "1" name = "lan_giga" id = "lan_giga">
                                <label class = "form-check-label" for = "defaultCheck1">
                                    Sim
                                </label>
                            </div>
                            <div class = "form-group col-md-4">
                                <label for = "frequencia">Frequência</label>
                                <div class = "form-check">
                                    <input class = "form-check-input" type = "checkbox" value = "1" name = "doisghz" id = "doisghz" checked>
                                    <label class = "form-check-label" for = "defaultCheck1">
                                        2.4Ghz
                                    </label>
                                </div>
                                <div class = "form-check">
                                    <input class = "form-check-input" type = "checkbox" value = "1" name = "cincoghz" id = "cincoghz">
                                    <label class = "form-check-label" for = "defaultCheck1">
                                        5.8Ghz
                                    </label>
                                </div></div>
                            <div class = "form-group col-md-4">
                                <label for = "padrao2G">Padrão 2.4Ghz</label>
                                <div class = "form-check">
                                    <input class = "form-check-input" type = "radio" name = "padrao_2g" id = "padrao_2g" value = "IEEE 802.11b/g/n" checked>
                                    <label class = "form-check-label">
                                        IEEE 802.11b/g/n
                                    </label>
                                </div>
                                <div class = "form-check">
                                    <input class = "form-check-input" type = "radio" name = "padrao_2g" id = "padrao_2g" value = "IEEE 802.11b/g">
                                    <label class = "form-check-label">
                                        IEEE 802.11b/g
                                    </label>
                                </div>
                                <div class = "form-check">
                                    <input class = "form-check-input" type = "radio" name = "padrao_2g" value = "IEEE 802.11b/g" id = "padrao_2g">
                                    <label class = "form-check-label">
                                        IEEE 802.11b
                                    </label>
                                </div>
                            </div>
                            <div class = "form-group col-md-4">
                                <label for = "padrao5G">Padrão 5.8Ghz</label>
                                <div class = "form-check">
                                    <input class = "form-check-input" type = "radio" name = "padrao_5g" value = "IEEE 802.11a/n/ac" id = "padrao_5g">
                                    <label class = "form-check-label">
                                        IEEE 802.11a/n/ac
                                    </label>
                                </div>
                                <div class = "form-check">
                                    <input class = "form-check-input" type = "radio" name = "padrao_5g" value = "IEEE 802.11a/n" id = "padrao_5g">
                                    <label class = "form-check-label">
                                        IEEE 802.11a/n
                                    </label>
                                </div>
                                <div class = "form-check">
                                    <input class = "form-check-input" type = "radio" name = "padrao_5g" value = "IEEE 802.11a" id = "padrao_5g">
                                    <label class = "form-check-label">
                                        IEEE 802.11a
                                    </label>
                                </div></div>
                            <div class = "form-group col-md-12">
                                <label for = "ipv6_label">Compatibilidade IPV6</label>
                                <input type = "checkbox" value = "1" name = "ipv6" id = "ipv6">
                                <label for = "defaultCheck1">
                                    Sim
                                </label>
                            </div>
                            <div class = "form-group col-md-12">
                                <label class="control-label">Imagem do Roteador:</label><br/>
                                <input id="imagem_src" name="imagem_src" class="file" type="file" /><br/>   
                            </div>
                            <div class="botoes">
                            <button type = "submit" class = "btn btn-primary">Salvar</button>
                            <a href="index.php"><button type = "button" class = "btn btn-danger">Voltar</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
</div>
    </body>
    <script src = "https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity = "sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin = "anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>
