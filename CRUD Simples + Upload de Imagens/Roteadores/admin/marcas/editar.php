<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>GERÊNCIAMENTO SMARTFOOD - EDITAR CATEGORIA</title>
        <meta name="theme-color" content="#23282e">
        <meta name="apple-mobile-web-app-status-bar-style" content="#23282e">
        <meta name="msapplication-navbutton-color" content="#23282e">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link href="../../css/categorias/styles.css" rel="stylesheet">
        <link href="../../css/categorias/bootstrap.min.css" rel="stylesheet">  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="icon" type="imagem/png" href="../../img/smartfood_faveicon.png" />
    </head>
    <body>
        <section class="fundo">
          <header>
            <div id="centro"> 
                <span class="btn btn-success">&bull; Editar Categoria&nbsp;&bull;</span>&nbsp;&nbsp;&nbsp;&nbsp;
                <a class="btn btn-primary" href='index.php'>Lista de Categorias</a>&nbsp;&nbsp;&nbsp;&nbsp;
                <a class="btn btn-danger" href='../index.php'>Home</a>            
            </div>  
        </header>
            <section class="lista">
                    <h3>Editar Categoria</h3>
                    <?php
                    include "../../config.php";
                    $id = $_GET["id"];
                    $query = "SELECT * FROM marcas WHERE idMarca=" . $id . ";";
                    $resultado = $CONEXAO->query($query);
                    $nome = "";
                    if ($resultado) {
                        while ($linha = $resultado->fetch_assoc()) {
                            $nome = $linha["marca"];
                        }
                        ?>
                        <form action="editar_processa.php" method="post" class="formulario">
                            <input type="hidden" value="<?= $id ?>" name="idCategoria" id="idCategoria"/>
                            <h4>Nome:</h4>
                            <input class="form-control form-control-sm" type="text" value="<?= $nome ?>" name="nome" id="nome"/>
                            <br>
                            <div>
                                <input type="reset" class="btn btn-danger" type="reset" value="Limpar"/> 
                                &nbsp;
                                <input type="submit" type="button" class="btn btn-success" value="Alterar"/>
                            </div>  
                        </form> 
                    <br>
                        <?php
                    } else {
                        echo "Erro!";
                    }
                    ?> 
            </section>
        </section>
    </body>
</html>
