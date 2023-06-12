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

$revisao = $a['revisao'];

// TODO: ABAS
// $abas = [];

// array_push($abas, "");
// $x = 1;
// while($x <= $revisao){
//     $rev = "rev" . $x;
//     array_push($abas,$rev);
//     $x = $x + 1;
// }

// var_dump($abas);

if (empty($a["weight"])) {
    $a["weight"] = "NEED TO ADD";
}
if (empty($a["length"])) {
    $a["length"] = "NEED TO ADD";
}
if (empty($a["depth"])) {
    $a["depth"] = "NEED TO ADD";
}
if (empty($a["width"])) {
    $a["width"] = "NEED TO ADD";
}

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
            grid-template-columns: 20% 80%;
            /* text-align: center; */
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

        .abas {
            display: none;
        }

        .botaomenu {
            height: 60px;
            position: fixed;
            top: 5em;
            right: -1px;
            z-index: 2;
        }

        .imgBotao {

            cursor: pointer;

            animation-duration: 3s;
            animation-name: slidein;
            animation-iteration-count: infinite;
        }

        .displaymenu {
            justify-content: center;
            display: grid;
            grid-template-columns: auto auto;
            gap: 10px;
        }

        .cardmenu {
            padding-top: 0.5em;
            text-align: center;
            border: solid 2px black;
            border-radius: 10px;
            width: 200px;
            height: 50px;
        }

        @keyframes slidein {
            0% {
                height: 100%;
            }

            50% {
                height: 105%;
            }

            100% {
                height: 100%;
            }
        }
    </style>

</head>

<body>

    <!-- //TODO: MENU OVERFLOW -->
    <div class="botaomenu">
        <img class="imgBotao" src="../assets/Menu.png" alt="" height="60">
    </div>

    <div class="menuEscondido">
        <br>
        <div style="width: 600px; margin:auto;border: 1px solid black;border-radius: 12px;">
            <div class="displaymenu"  style="padding:2em 0 0 0;">
                <div class="cardmenu">
                    <p style="padding: 0;margin:0;margin-top:2px">Retirar Visualização</p>
                </div>
                <div class="cardmenu">
                    <p style="padding: 0;margin:0;margin-top:2px">Aceitar / Negar</p>
                </div>
                <div class="cardmenu">
                    <p style="padding: 0;margin:0;margin-top:2px">Pedir revisão</p>
                </div>
                <div class="cardmenu">
                    <p style="padding: 0;margin:0;margin-top:2px">Adiar</p>
                </div>
            </div>
            <hr>
            <div style="text-align: center;">
                <!--  -->
                <button class="btn btn-danger">Remove Alert</button>
                <br><br>
            </div>
            <div style="text-align: center;">
                <!--  -->
                <button class="btn btn-success">Accept</button>
                <button class="btn btn-danger">Deny</button>
                <br><br>
            </div>
            <div style="text-align: center;">
                <!--  -->
                <button class="btn btn-success">Create Revision</button>
            </div>
            <div style="text-align: center;">
                <!--  -->
                <button class="btn btn-success">Delay the deadline</button>
            </div>
            
        </div>
    </div>

    <!-- //TODO: MENU OVERFLOW -->

    <br>
    <div style="width:550px;margin:auto">
        <?php if ($a['statusAmostra'] == 1) {
            echo '<img src="../assets/2stage.png" alt="stage" height="50">';
        } else {
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
                    <?php echo '<a href="../imagens/' . $a["id_fabrica"] . '/' . $a["referencia"] . '.png" target="_blank"><img  src="../imagens/' . $a["id_fabrica"] . '/' . $a["referencia"] . '.png" height="240" width="169"></a>'; ?>
                </div>
                <br>
            </div>
            <div class="">
                <br>
                <label class="negrito" for="fabrica">Fabricator</label>
                <p><?= $f['nome'] ?></p>
                <div>
                    <div style="display: grid;grid-template-columns: 33% 33% 33%; gap:10px">
                        <div>
                            <label class="negrito" for="referencia">Reference</label>
                            <p><?= $a["referencia"] ?></p>
                        </div>
                        <div>
                            <label class="negrito" for="marca">Brand</label>
                            <p><?= $a["marca"] ?></p>
                        </div>
                        <div>
                            <label class="negrito" for="linkDownload">Download Link</label>
                            <p><?= $a["linkDownload"] ?></p>
                        </div>
                    </div>
                </div>
                <div style="display: grid;grid-template-columns: 33% 33% 33%; gap:10px">
                    <div>
                        <label class="negrito" for="dataEnvio">Upload Date</label>
                        <p><?= $a["dataEnvio"] ?></p>
                    </div>
                    <div>
                        <label class="negrito" for="dataDownload">Limit Download Date</label>
                        <p><?= $a["dataDownload"] ?></p>
                    </div>
                    <div>
                        <label class="negrito" for="deadlineAmostra">Sample Deadline</label>
                        <p><?= $a["deadlineAmostra"] ?></p>
                    </div>
                </div>
                <div id="delaydiv" style="display: none;">
                    <form action="../controllers/delayController.php" method="post">
                        <input type="hidden" name="id" value="<?= $pedido ?>">
                        <input type="date" name="new_date" required>
                        <br><br>
                        <button class="btn btn-primary">Send</button>
                    </form>
                </div>
                <div style="text-align: right;">
                    <button onClick="ShowDelay()" class="btn btn-success">Ask to delay deadline</button>
                </div>
                <hr>
                <div style="display: grid;grid-template-columns: 25% 25% 25% 25%; gap:10px">
                    <div>
                        <label class="negrito" for="dataEnvio">Weight (g/kg/lbs)</label>
                        <p style="color: brown;font-weight: bold;"><?= $a["weight"] ?></p>
                    </div>
                    <div>
                        <label class="negrito" for="dataDownload">Length (cm)</label>
                        <p style="color: brown;font-weight: bold;"><?= $a["length"] ?></p>
                    </div>
                    <div>
                        <label class="negrito" for="deadlineAmostra">Depth (cm)</label>
                        <p style="color: brown;font-weight: bold;"><?= $a["depth"] ?></p>
                    </div>
                    <div>
                        <label class="negrito" for="deadlineAmostra">Width (cm)</label>
                        <p style="color: brown;font-weight: bold;"><?= $a["width"] ?></p>
                    </div>
                </div>
                <div id="medidas" style="display: none;">
                    <form action="../controllers/medidasController.php" method="post">
                        <input type="hidden" name="id" value="<?= $pedido ?>">
                        <label for="weight">Weight</label>
                        <input type="text" name="weight">

                        <label for="lenght">Lenght</label>
                        <input type="text" name="lenght">

                        <label for="depth">Depth</label>
                        <input type="text" name="depth">

                        <label for="width">Width</label>
                        <input type="text" name="width">
                        <br><br>
                        <button class="btn btn-primary">Send</button>
                    </form>
                </div>
                <div style="text-align: right;">
                    <button onClick="ShowMeasures()" class="btn btn-success">Add Measurements</button>
                </div>
            </div>
        </div>

        <hr style="border-top: 3px solid #F8B32D;">

        <div class="fotos">
            <h4 style="margin: 0 2em;">Samples</h4>
            <div style="height: 30px;">
                <div style="width: 20%; display:grid; grid-template-columns: auto auto auto;margin:auto;">
                    <div style="text-align:center;">
                        <img style="cursor: pointer;" onclick="Andar(-1)" height="30" src="../assets/Left.png" alt="">
                    </div>
                    <div>
                        <h4 id="paginas" style="text-align: center;"><?= $revisao ?></h4>
                    </div>
                    <div style="text-align:center;">
                        <img style="cursor: pointer;" onclick="Andar(1)" height="30" src="../assets/Right.png" alt="">
                    </div>

                </div>
            </div>
            <br>
            <!-- // TODO: Ver como funciona as fotos -->
            <div class="fotosgrid abas" id="0">
                <?php
                $fotos = glob("../imagens/200/" . $a["referencia"] . "*.png");

                if (empty($fotos)) {
                    echo '<img src="../assets/placeholder100.png" width=150 height=150>';
                } else {
                    foreach ($fotos as $f) {
                        echo '<a href="' . $f . '" target="_blank"><img src="' . $f . '" width=150 height=150 ></a>';
                    }
                }
                ?>
            </div>
            <div class="fotosgrid abas" id="1">
                <?php
                $fotos1 = glob("../imagens/200/rev1/" . $a["referencia"] . "*.png");

                if (empty($fotos1)) {
                    echo '<img src="../assets/placeholder100.png" width=150 height=150>';
                } else {
                    foreach ($fotos1 as $f) {
                        echo '<a href="' . $f . '" target="_blank"><img src="' . $f . '" width=150 height=150 ></a>';
                    }
                }
                ?>
            </div>
            <div class="fotosgrid abas" id="2">
                <?php
                $fotos2 = glob("../imagens/200/rev2/" . $a["referencia"] . "*.png");

                if (empty($fotos2)) {
                    echo '<img src="../assets/placeholder100.png" width=150 height=150>';
                } else {
                    foreach ($fotos2 as $f) {
                        echo '<a href="' . $f . '" target="_blank"><img src="' . $f . '" width=150 height=150 ></a>';
                    }
                }
                ?>
            </div>
            <div class="fotosgrid abas" id="3">
                <?php
                $fotos3 = glob("../imagens/200/rev3/" . $a["referencia"] . "*.png");

                if (empty($fotos3)) {
                    echo '<img src="../assets/placeholder100.png" width=150 height=150>';
                } else {
                    foreach ($fotos3 as $f) {
                        echo '<a href="' . $f . '" target="_blank"><img src="' . $f . '" width=350 height=150 ></a>';
                    }
                }
                ?>
            </div>
            <div class="fotosgrid abas" id="4">
                <?php
                $fotos4 = glob("../imagens/200/rev4/" . $a["referencia"] . "*.png");

                if (empty($fotos4)) {
                    echo '<img src="../assets/placeholder100.png" width=150 height=150>';
                } else {
                    foreach ($fotos4 as $f) {
                        echo '<a href="' . $f . '" target="_blank"><img src="' . $f . '" width=150 height=150 ></a>';
                    }
                }
                ?>
            </div>
            <div class="fotosgrid abas" id="5">
                <?php
                $fotos5 = glob("../imagens/200/rev5/" . $a["referencia"] . "*.png");

                if (empty($fotos5)) {
                    echo '<img src="../assets/placeholder100.png" width=150 height=150>';
                } else {
                    foreach ($fotos5 as $f) {
                        echo '<a href="' . $f . '" target="_blank"><img src="' . $f . '" width=150 height=150 ></a>';
                    }
                }
                ?>
            </div>
            <br>
            <div style="margin-left:2em;margin-right:2em;">
                <h2>Select Images to upload</h2>
                <form action="../controllers/fotosController.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $pedido ?>">
                    <input type="hidden" name="referencia" value="<?= $a["referencia"] ?>">
                    <input type="hidden" name="revisao" value="<?= $a["revisao"] ?>">
                    <input type="file" id="imagem" name="imagem[]" multiple>
                    <br><br>
                    <button class="btn btn-primary">Submit Images</button>
                </form>
            </div>
        </div>

        <hr style="border-top: 3px solid #F8B32D;">

        <br>
        <div style="margin-left:2em;margin-right:2em;">
            <h2>Comments</h2>
            <hr>
            <?php
            foreach ($comentarios as $c) {
                // var_dump($c);
                echo '<div>';
                echo '<h5>' . $c["usuario"] . ' | ' . $c["dataEnviado"] . '</h5>';
                echo '<p>' . $c["comentario"] . '</p>';
                echo '</div>';
                echo '<hr>';
            }
            ?>
        </div>
    </div>

    <br><br>


    <script>
        x = document.getElementById('paginas').innerHTML;
        document.getElementById(x).style.display = "grid";


        function Andar(y) {


            x = document.getElementById('paginas').innerHTML;
            x = parseInt(x);

            if ((x + y) > 5 || (x + y) < 0) {
                console.log("Error");
            } else {
                x = x + y;
                document.getElementById('paginas').innerHTML = x;


                document.getElementById('0').style.display = "none";
                document.getElementById('1').style.display = "none";
                document.getElementById('2').style.display = "none";
                document.getElementById('3').style.display = "none";
                document.getElementById('4').style.display = "none";
                document.getElementById('5').style.display = "none";

                document.getElementById(x).style.display = "grid";
            }

            console.log(x);

        }


        let img = document.getElementById('img');
        let imagem = document.getElementById('imagem');

        imagem.onchange = (e) => {
            if (imagem.files[0])
                img.src = URL.createObjectURL(imagem.files[0]);
        }

        function ShowMeasures() {
            var i = document.getElementById('medidas').style.display;

            if (i == "block") {
                document.getElementById('medidas').style.display = "none";
            } else {
                document.getElementById('medidas').style.display = "block";
            }
        }


        function ShowDelay() {
            var i = document.getElementById('delaydiv').style.display;

            if (i == "block") {
                document.getElementById('delaydiv').style.display = "none";
            } else {
                document.getElementById('delaydiv').style.display = "block";
            }
        }
    </script>
</body>

</html>