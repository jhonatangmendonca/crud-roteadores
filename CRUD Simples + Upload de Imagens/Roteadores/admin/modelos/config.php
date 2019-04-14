<?php

$SERVIDOR = "127.0.0.1";
$USUARIO = "root";
$SENHA = "";
$BANCO = "roteadores";

$CONEXAO = mysqli_connect($SERVIDOR, $USUARIO, $SENHA, $BANCO);

if (!$CONEXAO) {
    echo "Erro: Não foi possível conectar ao MySQL.<br/>";
    echo "Código de erro: " . mysqli_connect_errno() . "<br/>";
    echo "Erro: " . mysqli_connect_error() . "<br/>";
    exit;
}
 

$UPLOAD_DIRECTORY = "../fotos_modelo/";

function upload($file, $prefix, $sufix = FALSE) {
    global $UPLOAD_DIRECTORY;

    $temp_name = explode(".", $file["name"]);
    $new_name = "";
    if (!empty($sufix)) {
        $new_name = $prefix . '_' . $sufix . '.' . end($temp_name);
    } else {
        $new_name = $prefix . '.' . end($temp_name);
    }
    $error = !move_uploaded_file($file["tmp_name"], $UPLOAD_DIRECTORY . $new_name);
    if ($error) {
        return false;
    } else {
        return $new_name;
    }
}


 ?>
