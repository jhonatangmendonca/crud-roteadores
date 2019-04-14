<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>..:: Gerenciamento Roteador ::..   Editar Modelo</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../css/editar_modelo.css"> 
        <script src="../js/jquery-min.js"></script>
    </head>
    <body> 
        <section class="fundo">
            <header><h1>Editar Modelo</h1></header>
            <?php
            $id = $_GET["id"];
            include "../../config.php";
            $query = "  SELECT roteadores.*, marcas.marca AS marca FROM roteadores INNER JOIN marcas ON roteadores.marca=marcas.idMarca WHERE id=" . $id . ";";
            $resultado = $CONEXAO->query($query);
            if ($resultado) {
                while ($linha = $resultado->fetch_assoc()) {
                    $id = $linha["id"];
                    $marca = $linha["marca"];
                    $modelo = $linha["modelo"];
                    $qnt_wan = $linha["qnt_wan"];
                    $wan_gigabit = $linha["wan_gigabit"];
                    $qnt_lan = $linha["qnt_lan"];
                    $lan_gigabit = $linha["lan_gigabit"];
                    $frequencia_2g = $linha["frequencia_2g"];
                    $frequencia_5g = $linha["frequencia_5g"];
                    $padrao_2g = $linha["padrao_2g"];
                    $padrao_5g = $linha["padrao_5g"];
                    $ipv6 = $linha["ipv6"];
                    $src = $linha["src"];
                }
                ?>
                <form action="editar_processa.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" value="<?= $id ?>" name="IdModelo" id="IdModelo"/>
                    <div class="container">
                        <div class="card">
                            <div class="card-body">
                                <div class = "form-row">
                                    <div class = "form-group col-md-6">
                                        <label for = "marca">Marca</label>
                                        <select class = "form-control" name = "marca" id = "marca" value="<?= $marca ?>">
                                            <?php
                                            include "../config.php";
                                            $query = "SELECT * FROM marcas;";
                                            $resultado = $CONEXAO->query($query);
                                            if ($resultado) {
                                                if ($resultado->num_rows > 0) {
                                                    while ($linha = $resultado->fetch_assoc()) {
                                                        ?>
                                                        <option value=" <?= $linha["idMarca"] ?> " <?php
                                                        if ($marca == $linha["marca"]) {
                                                            echo 'selected="selected"';
                                                        }
                                                        ?>> <?= $linha["marca"] ?> </option>
                                                                <?php
                                                            }
                                                        } else {
                                                            echo "Nenhuma Categoria Encontrada!";
                                                        }
                                                    } else {
                                                        die("Erro!");
                                                    }
                                                    ?>
                                        </select>
                                    </div>
                                    <div class = "form-group col-md-6">
                                        <label for = "modelo">Modelo</label>
                                        <input class = "form-control" name = "modelo" id = "modelo" type = "text" required="" value="<?= $modelo ?>">
                                    </div>
                                    <div class = "form-group col-md-6">
                                        <label for = "qtd_wan_label">Quantidade WAN</label>
                                        <select class = "form-control" name = "qtd_wan" id = "qtd_wan"  value="2">
                                            <option <?php
                                                    if ($qnt_wan == '1') {
                                                        echo 'selected="selected"';
                                                    }
                                                    ?>>1</option>
                                            <option <?php
                                                if ($qnt_wan == '2') {
                                                    echo 'selected="selected"';
                                                }
                                                ?>>2</option>
                                            <option <?php
                                               if ($qnt_wan == '3') {
                                                   echo 'selected="selected"';
                                               }
                                               ?>>3</option>
                                        </select>
                                        <label for = "wan_giga">Gigabit?</label>
                                        <input type = "checkbox" value = "1" name = "wan_giga" id = "wan_giga" <?php
                                               if ($wan_gigabit == '1') {
                                                   echo 'checked';
                                               }
                                               ?>>
                                        <label for = "defaultCheck1">
                                            Sim
                                        </label>
                                    </div>
                                    <div class = "form-group col-md-6">
                                        <label for = "qtd_lan_label">Quantidade LAN</label>
                                        <select class = "form-control" name = "qtd_lan" id = "qtd_lan">  
                                            <option <?php
                                                if ($qnt_lan == '1') {
                                                    echo 'selected="selected"';
                                                }
                                                ?>>1</option>
                                            <option <?php
                                            if ($qnt_lan == '2') {
                                                echo 'selected="selected"';
                                            }
                                            ?>>2</option>
                                            <option <?php
                                            if ($qnt_lan == '3') {
                                                echo 'selected="selected"';
                                            }
                                            ?>>3</option>
                                            <option <?php
                                            if ($qnt_lan == '4') {
                                                echo 'selected="selected"';
                                            }
                                            ?>>4</option>
                                            <option <?php
                                           if ($qnt_lan == '5') {
                                               echo 'selected="selected"';
                                           }
                                           ?>>5</option>
                                            <option <?php
                                           if ($qnt_lan == '6') {
                                               echo 'selected="selected"';
                                           }
                                           ?>>6</option>
                                            <option <?php
                                           if ($qnt_lan == '7') {
                                               echo 'selected="selected"';
                                           }
                                            ?>>7</option>
                                            <option <?php
                                        if ($qnt_lan == '8') {
                                            echo 'selected="selected"';
                                        }
                                        ?>>8</option>
                                        </select>
                                        <label for = "lan_giga">Gigabit?</label>
                                        <input type = "checkbox" value = "1" name = "lan_giga" id = "lan_giga" <?php
                                            if ($lan_gigabit == '1') {
                                                echo 'checked';
                                            }
                                            ?>>
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
                                            <input class = "form-check-input" type = "checkbox" value = "1" name = "cincoghz" id = "cincoghz" <?php
                                            if ($frequencia_5g == '1') {
                                                echo 'checked';
                                            }
                                            ?>>
                                            <label class = "form-check-label" for = "defaultCheck1">
                                                5.8Ghz
                                            </label>
                                        </div></div>
                                    <div class = "form-group col-md-4">
                                        <label for = "padrao2G">Padrão 2.4Ghz</label>
                                        <div class = "form-check">
                                            <input class = "form-check-input" type = "radio" name = "padrao_2g" id = "padrao_2g" value = "IEEE 802.11b/g/n" <?php
                                            if ($padrao_2g == 'IEEE 802.11b/g/n') {
                                                echo 'checked';
                                            }
                                            ?>>
                                            <label class = "form-check-label">
                                                IEEE 802.11b/g/n
                                            </label>
                                        </div>
                                        <div class = "form-check">
                                            <input class = "form-check-input" type = "radio" name = "padrao_2g" id = "padrao_2g" value = "IEEE 802.11b/g"  <?php
                                            if ($padrao_2g == 'IEEE 802.11b/g') {
                                                echo 'checked';
                                            }
                                            ?>>
                                            <label class = "form-check-label">
                                                IEEE 802.11b/g
                                            </label>
                                        </div>
                                        <div class = "form-check">
                                            <input class = "form-check-input" type = "radio" name = "padrao_2g" value = "IEEE 802.11b/g" id = "padrao_2g"  <?php
                                            if ($padrao_2g == 'IEEE 802.11b/g') {
                                                echo 'checked';
                                            }
                                            ?>>
                                            <label class = "form-check-label">
                                                IEEE 802.11b
                                            </label>
                                        </div>
                                    </div>
                                    <div class = "form-group col-md-4">
                                        <label for = "padrao5G">Padrão 5.8Ghz</label>
                                        <div class = "form-check">
                                            <input class = "form-check-input" type = "radio" name = "padrao_5g" value = "IEEE 802.11a/n/ac" id = "padrao_5g" <?php
                                        if ($padrao_5g == 'IEEE 802.11a/n/ac') {
                                            echo 'checked';
                                        }
                                        ?>>
                                            <label class = "form-check-label">
                                                IEEE 802.11a/n/ac
                                            </label>
                                        </div>
                                        <div class = "form-check">
                                            <input class = "form-check-input" type = "radio" name = "padrao_5g" value = "IEEE 802.11a/n" id = "padrao_5g" <?php
                                        if ($padrao_5g == 'IEEE 802.11a/n') {
                                            echo 'checked';
                                        }
                                        ?>>
                                            <label class = "form-check-label">
                                                IEEE 802.11a/n
                                            </label>
                                        </div>
                                        <div class = "form-check">
                                            <input class = "form-check-input" type = "radio" name = "padrao_5g" value = "IEEE 802.11a" id = "padrao_5g" <?php
                                        if ($padrao_5g == 'IEEE 802.11a') {
                                            echo 'checked';
                                        }
                                        ?>>
                                            <label class = "form-check-label">
                                                IEEE 802.11a
                                            </label>
                                        </div></div>
                                    <div class = "form-group col-md-12">
                                        <label for = "ipv6_label">Compatibilidade IPV6</label>
                                        <input type = "checkbox" value = "1" name = "ipv6" id = "ipv6" <?php
                                        if ($ipv6 == '1') {
                                             echo 'checked';
                                        }
                                        ?>>
                                        <label for = "defaultCheck1">
                                            Sim
                                        </label>
                                    </div>
                                    <div class = "form-group col-md-12">
                                        <label class="control-label">Imagem Cadastrada:</label><br/>
                                        <input type="radio" id="imagem_src_chooser1" name="imagem_src_chooser" value="0" checked="checked" hidden="">&nbsp;&nbsp;
                                        <?php 
                                        $UPLOAD_DIRECTORY = "../../admin/fotos_modelo/";
                                        echo "<img style='width:200px;' src='$UPLOAD_DIRECTORY/" . $src . "' alt='" . $src . "'/>";
                                        ?>
                                        <br/><label style="margin-left:0px;" class="control-label">Selecionar Nova Imagem:</label><br/>
                                        <div class='col-lg-1'><input type="radio" id="imagem_src_chooser2" name="imagem_src_chooser" value="1" hidden=""></div><br/> 
                                        <div class='col-lg-11'><input style="margin-left:-15px;" id="imagem_src" name="imagem_src" type="file" /></div>
                                    </div>
                                    <div class="botoes">  <input type="reset" class="btn btn-danger" type="reset" value="Limpar"/> 
                                        <input type="submit" type="button" class="btn btn-success" value="Alterar"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>    
                </form> 
                <br/>
    <?php
} else {
    echo "Erro!";
}
?> 
        </section>
        <script>
            $("#imagem_src").change(function () {
                $("#imagem_src_chooser1").prop("checked", false);
                $("#imagem_src_chooser2").prop("checked", true);
            });
        </script>  
    </body>
</html>
