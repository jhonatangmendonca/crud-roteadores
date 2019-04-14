<?php

include "config.php";
$id = $_POST['IdModelo'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$qtd_wan = $_POST['qtd_wan'];
$qtd_lan = $_POST['qtd_lan'];
$doisghz = $_POST['doisghz'];
$padrao_2g = $_POST['padrao_2g'];
if (empty($_POST['wan_giga'])) {
    $wan_giga = 0;
} else {
    $wan_giga = $_POST['wan_giga'];
}
if (empty($_POST['lan_giga'])) {
    $lan_giga = 0;
} else {
    $lan_giga = $_POST['lan_giga'];
}
if (empty($_POST['cincoghz'])) {
    $cincoghz = 0;
} else {
    $cincoghz = $_POST['cincoghz'];
}
if (empty($_POST['padrao_5g'])) {
    $padrao_5g = 0;
} else {
    $padrao_5g = $_POST['padrao_5g'];
}
if (empty($_POST['ipv6'])) {
    $ipv6 = 0;
} else {
    $ipv6 = $_POST['ipv6'];
}
$imagem_src_chooser = $_POST['imagem_src_chooser'];

//echo "Marca: " . $marca . "<br>";
//echo "Modelo:" . $modelo . "<br>";
//echo "Qnt Wan: " . $qtd_wan . "<br>";
//echo "Wan Giga: " . $wan_giga . "<br>";
//echo "Qnt Lan: " . $qtd_lan . "<br>";
//echo "Lan Giga: " . $lan_giga . "<br>";
//echo "2,4ghz: " . $doisghz . "<br>";
//echo "5ghz: " . $cincoghz . "<br>";
//echo "Padrão 2,4ghz: " . $padrao_2g . "<br>";
//echo "Padrão 5ghz: " . $padrao_5g . "<br>";
//echo "Ipv6: " . $ipv6 . "<br>";
//echo "Nova Foto: " . $imagem_src_chooser . "<br>";


if ($imagem_src_chooser == 0) {
    $query = "UPDATE roteadores SET marca='" . $marca . "',modelo='" . $modelo . "', qnt_wan='" . $qtd_wan . "'," . "wan_gigabit='" . $wan_giga . "',qnt_lan='" . $qtd_lan . "'," . "lan_gigabit='" . $wan_giga . "',frequencia_2g='" . $doisghz . "',frequencia_5g='" . $cincoghz . "',padrao_2g='" . $padrao_2g . "',padrao_5g='" . $padrao_5g . "',ipv6='" . $ipv6 . "' WHERE id=" . $id . ";";
    $resultado = $CONEXAO->query($query);
    $CONEXAO->close();
    if ($resultado) {
        echo "<script>alert('Dados Alterados Com Sucesso!');</script>";
        echo("<script type='text/javascript'>location.href='index.php';</script>");
    } else {
        die("Erro!");
    }
}

if ($imagem_src_chooser == 1) {
    if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
        $prefix = date("Ymd") . "_" . round(microtime(true));
        $new_src_name = "";
        if (isset($_FILES["imagem_src"]) && !empty(trim($_FILES["imagem_src"]["name"]))) {
            $new_src_name = upload($_FILES["imagem_src"], $prefix);
            //echo $new_src_name;
        }
        $query = "SELECT src FROM roteadores WHERE id=" . $id . ";";
        $resultado = $CONEXAO->query($query);
        if ($resultado) {
            if ($resultado->num_rows > 0) {
                while ($linha = $resultado->fetch_assoc()) {
                    $imagem_antiga = $linha["src"];
                }
            }
        } else {
            die("Erro!");
        }
        unlink($UPLOAD_DIRECTORY . $imagem_antiga);
        $query = "UPDATE roteadores SET marca='" . $marca . "',modelo='" . $modelo . "', qnt_wan='" . $qtd_wan . "'," . "wan_gigabit='" . $wan_giga . "',qnt_lan='" . $qtd_lan . "'," . "lan_gigabit='" . $wan_giga . "',frequencia_2g='" . $doisghz . "',frequencia_5g='" . $cincoghz . "',padrao_2g='" . $padrao_2g . "',padrao_5g='" . $padrao_5g . "',ipv6='" . $ipv6 . "',src='" . $new_src_name . "' WHERE id=" . $id . ";";
        $resultado = $CONEXAO->query($query);
        $CONEXAO->close();
        if ($resultado) {
           echo "<script>alert('Dados Alterados Com Sucesso!');</script>";
           echo("<script type='text/javascript'>location.href='index.php';</script>");
        } else {
            die("Erro!");
        }
    }
}
?>