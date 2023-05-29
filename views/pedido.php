<?php
// TODO: Criar um campo de confirmação de pedido para os usuários

include '../controllers/sessaoController.php';

verificaSessao();

include '../models/comentarios.php';



$hoje = date('Y-m-d');

include '../models/pedidos.php';
include '../models/fabrica.php';

$pedido = $_POST['id'];


$a = buscaPedidoID($conn, $pedido);
$f = pegaFabricaPorID($conn, $a['id_fabrica']);

$comentarios = comentariosPorPedido($conn, $pedido);

include 'components/header.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submission</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <style>
        .card {
            border: 3px solid black;
            border-radius: 10px;
            width: 98%;
            margin: auto;
        }

        .negrito {
            font-weight: bold;
        }

        .inicio {
            background-color: #F8B32D;
            border-radius: 6px 6px 0 0;
        }

        .inicio h4 {
            margin: 10px 1em;
        }

        .inside {
            margin: 10px 1em;
        }

        .grid2 {
            display: grid;
            grid-template-columns: 30% 70%;
            text-align: center;
        }

        .centro {
            text-align: center;
        }

        .fotosgrid {
            display: grid;
            grid-template-columns: auto auto auto auto auto auto auto auto;
            gap: 5px;
            width: 90%;
            margin: auto;
        }
    </style>

</head>

<body>

    <br>
    <div style="width:550px;margin:auto">
    <?php if($a['statusAmostra'] == 1){
        echo '<img src="../assets/2stage.png" alt="stage" height="50">';
    }else{
        echo '<img src="../assets/1stage.png" alt="stage" height="50">';
    }
    ?>
    </div>
    <br>
    <div class="card">

        <div class="inicio">
            <h4>Submission</h4>
        </div>

        <div class="inside grid2">
            <div class="centro">
                <br><br>
                <div>
                    <?php echo '<a href="../imagens/' . $a["id_fabrica"] . '/' . $a["referencia"] . '.png" target="_blank"><img  src="../imagens/' . $a["id_fabrica"] . '/' . $a["referencia"] . '.png" height="297" width="210"></a>'; ?>
                </div>
                <br>
            </div>
            <div class="">
                <label class="negrito" for="fabrica">Fabricator</label>
                <input class="form-control" name="fabrica" value="<?= $f['nome'] ?>" readonly>
                <label class="negrito" for="referencia">Reference</label>
                <input required class="form-control" type="text" name="referencia" value="<?= $a["referencia"] ?>" readonly>
                <label class="negrito" for="marca">Brand</label>
                <input required class="form-control" type="text" name="marca" value="<?= $a["marca"] ?>" readonly>
                <label class="negrito" for="linkDownload">Download Link</label>
                <input required class="form-control" type="text" name="linkDownload" value="<?= $a["linkDownload"] ?>" readonly>
                <div style="display: grid;grid-template-columns: auto auto; gap:10px">
                    <div>
                        <label class="negrito" for="dataEnvio">Upload Date</label>
                        <input required class="form-control" type="text" name="dataEnvio" value="<?= $a["dataEnvio"] ?>" readonly>
                    </div>
                    <div>
                        <label class="negrito" for="dataDownload">Limit Download Date</label>
                        <input required class="form-control" type="text" name="dataDownload" value="<?= $a["dataDownload"] ?>" readonly>
                    </div>
                </div>
                <label class="negrito" for="deadlineAmostra">Sample Deadline</label>
                <input required class="form-control" type="date" name="deadlineAmostra" value="<?= $a["deadlineAmostra"] ?>" readonly>
            </div>
        </div>
        <br><br>
        <!-- //TODO: Funcionario x Empresa -->
        <div class="container" style="text-align: center;">
            <h3 style="color:brown">Want to suggest a new deadline Date?</h3>
            <input style="width:30%;margin:auto" class="form-control" type="date">
            <br>
            <button class="btn btn-outline-success">Suggest</button>
        </div>
        <hr style="border-top: 3px solid #F8B32D;">
        <br>

        <div class="charts">
            <div style="margin-left:2em;margin-right:2em;">
                <h2>Select information sheet image</h2>
                <br>
                <div  class="grid2">
                <?php
                   $charts = glob('../imagens/400/'.$a["referencia"].'.png');
                   $display = "style='display:none'";
                   if(empty($charts)){
                        $charts = "../assets/placeholder.jpg";
                        $display = " ";
                   }else{
                    $charts = $charts[0];
                   }

                ?>
                    <div>
                        <img id="img" src="<?= $charts ?>" height="297" width="210" style="border: solid 1px black;">
                        <br><br>
                        <form action="../controllers/sheetsController.php" method="post" enctype="multipart/form-data">                            
                        
                    </div>
                    <div>
                        <h3>We need an information sheet with the following fields: Height, width, depth, and weight. <a href="../assets/Charts.png" download>Click here to see an example sheet</a></h3>
                        <small>After the first uploading, the button will disappear. <p style="color:red">So be careful.</p></small>
                        <br><br><br>
                        <input type="hidden" value="<?= $a["referencia"]?>" name="referencia">
                        <input <?= $display ?> required type="file" id="imagem" name="imagem" required>
                        <br><br><br>
                        <button <?= $display ?> class="btn btn-success">Send sheet</button>
                    </div>
                    </form>
                </div>
            </div>

            <br>
        </div>
        <br>

        <hr style="border-top: 3px solid #F8B32D;">
        <br>
        <div class="fotos">
            <div class="fotosgrid">
                <?php
                $fotos = glob("../imagens/200/" . $a["referencia"] . "*.png");
                if (empty($fotos)) {
                    echo '<img src="../assets/placeholder100.png">';
                } else {
                    foreach ($fotos as $f) {
                        echo '<a href="' . $f . '" target="_blank"><img src="' . $f . '" width=150 height=150 ></a>';
                    }
                }
                ?>
            </div>
            <br>
            <div style="margin-left:2em;margin-right:2em;">
                <h2>Select Images to upload</h2>
                <form action="../controllers/fotosController.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="referencia" value="<?= $a["referencia"] ?>">
                    <input type="file" id="imagem" name="imagem[]" multiple>
                    <br><br>
                    <button class="btn btn-primary">Submit Images</button>
                </form>
            </div>
        </div>
        <!-- //TODO: -->

        <?php 
            if($_SESSION['privilegio'] == "gerente"){
        ?>
        <hr style="border-top: 3px solid #F8B32D;">
        <br>
        <div style="margin-left:2em;margin-right:2em;">
        <h2>Can we go to Production?</h2>
        <br>
        <form action="../controllers/amostrasController.php" method="post">
            <input type="hidden" value="<?= $pedido ?>" name="id">
            <button type="submit" class="btn btn-danger">Next Step : Production</button>
        </form>

        <br>
        </div>
        <?php
            }
        ?>

        <hr style="border-top: 3px solid #F8B32D;">
        <br>
        <div>
            <div style="margin-left:2em;margin-right:2em;">
                <h2>New Comment</h2>
                <div class="novoComentario">
                    <form action="../controllers/comentariosController.php" method="post">
                        <input type="hidden" name="usuario" value="<?= $_SESSION['id'] ?>">
                        <input type="hidden" name="dataEnviado" value="<?= $hoje ?>">
                        <input type="hidden" name="id_pedidos" value="<?= $pedido ?>">
                        <label for="comentario">New Comment</label>
                        <div style="width: 90%;">
                            <textarea name="comentario" class="form-control" style="resize:none" rows="3" cols="50" maxlength="250"></textarea>
                        </div>
                        <br>
                        <button class="btn btn-success">Send Comment</button>
                    </form>
                    <br>
                </div>
                <h2>Comments</h2>
                <hr>
                <?php
                foreach ($comentarios as $c) {
                    // var_dump($c);
                    echo '<div>';
                        echo '<h5>'.$c["usuario"].' | '.$c["dataEnviado"].'</h5>';
                        echo '<p>'.$c["comentario"].'</p>';
                    echo '</div>';
                    echo '<hr>';
                }
                ?>
            </div>
        </div>
    </div>

    <br><br>


    <script>
        let img = document.getElementById('img');
        let imagem = document.getElementById('imagem');

        imagem.onchange = (e) => {
            if (imagem.files[0])
                img.src = URL.createObjectURL(imagem.files[0]);
        }
    </script>
</body>

</html>