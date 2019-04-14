
<?php
include("config.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <script src="js/jquery-min.js"></script>
    </head>
    <body>
        <?php
        $marca = isset($_POST['marca']) ? $_POST['marca'] : '';
        $modelo = isset($_POST['modelo']) ? $_POST['modelo'] : '';
        $qtd_wan = isset($_POST['qtd_wan']) ? $_POST['qtd_wan'] : '';
        $wan_giga = isset($_POST['wan_giga']) ? $_POST['wan_giga'] : '';
        $qtd_lan = isset($_POST['qtd_lan']) ? $_POST['qtd_lan'] : '';
        $lan_giga = isset($_POST['lan_giga']) ? $_POST['lan_giga'] : '';
        $doisghz = isset($_POST['doisghz']) ? $_POST['doisghz'] : '';
        $cincoghz = isset($_POST['cincoghz']) ? $_POST['cincoghz'] : '';
        $padrao_2g = isset($_POST['padrao_2g']) ? $_POST['padrao_2g'] : '';
        $padrao_5g = isset($_POST['padrao_5g']) ? $_POST['padrao_5g'] : '';
        $ipv6 = isset($_POST['ipv6']) ? $_POST['ipv6'] : '';
        if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
                $prefix = date("Ymd") . "_" . round(microtime(true));
                $new_src_name = "";
                if (isset($_FILES["imagem_src"]) && !empty(trim($_FILES["imagem_src"]["name"]))) {
                    $new_src_name = upload($_FILES["imagem_src"], $prefix);
                    echo $new_src_name;
                }
                $new_thumbnail_name = "";
                if (isset($_FILES["imagem_thumbnail"]) && !empty(trim($_FILES["imagem_thumbnail"]["name"]))) {
                    $new_thumbnail_name = upload($_FILES["imagem_thumbnail"], $prefix, "thumb");
                }
        }
        if (empty($wan_giga)) {
            $wan_giga = 0;
        }
        if (empty($lan_giga)) {
            $lan_giga = 0;
        }
        if (empty($cincoghz)) {
            $cincoghz = 0;
        }
        if (empty($padrao_5g)) {
            $padrao_5g = 0;
        }
        if (empty($ipv6)) {
            $ipv6 = 0;
        }
        echo $ipv6;
	$query = "SELECT * FROM roteadores WHERE marca = '" . $marca . "' AND modelo = '" . $modelo . "'";
    $modeloduplicado = $CONEXAO->query($query);
    $CONEXAO->close();
        if (count($modeloduplicado) != 0) {
            header('Location: cadastro-roteador.php?roteador-duplicado');
            exit;
        } else {
		$query = "INSERT INTO `roteadores` (`id`, `marca`, `modelo`, `qnt_wan`, `wan_gigabit`, `qnt_lan`, `lan_gigabit`,`frequencia_2g`, `frequencia_5g`, `padrao_2g`, `padrao_5g`, `ipv6`, `src`)VALUES (NULL, '" . $marca . "', '" . $modelo . "', '" . $qtd_wan . "', '" . $wan_giga . "', '" . $qtd_lan . "', '" . $lan_giga . "', '" . $doisghz . "','" . $cincoghz . "', '" . $padrao_2g . "', '" . $padrao_5g . "', '" . $ipv6 . "', '" . $new_src_name . "')";
    $insert = $CONEXAO->query($query);
    $CONEXAO->close();

            header('Location: inserir.php?roteador-salvo');
        }
        echo $new_src_name;
        ?>
    </body>
</html>
