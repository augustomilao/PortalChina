<?php
include_once '../controllers/sessaoController.php';

verificaSessao();
// var_dump($_SESSION);

include '../models/pedidos.php';

// 80 = Sinal para ver todas
if ($_SESSION['fabrica'] != 80) {
    $pedidos = buscaTodosPorFabrica($conn, $_SESSION['fabrica']);
} else {
    $pedidos = buscaTodosPedidos($conn);
}

$hoje = time();
$atrasados = [];
// var_dump($_SESSION);





?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    <style>
        p {
            padding: 0;
            margin: 0;
        }

        .card {
            border: 3px solid black;
            border-radius: 10px;
            width: 98%;
            margin: auto;
        }

        .inicio {
            background-color: #F8B32D;
            border-radius: 6px 6px 0 0;
        }

        .inicio h4 {
            margin: 10px 1em;
        }

        .grid5 {
            display: grid;
            grid-template-columns: 5% 20% 20% 20% 20% 15%;
        }

        .campo {
            text-align: center;
            height: 30px;
        }

        .notacao {
            font-weight: bold;
        }

        .linhas {
            height: 30px;
        }

        .link {
            color: black;
        }

        .link:hover {
            color: black;
        }

        .grid3 {
            display: grid;
            grid-template-columns: auto auto auto;
            gap: 1em;
            margin: auto;
            width: 30%;
        }

        .escolhas {
            border: 1px solid black;
            border-radius: 10px;
            cursor: pointer;
        }

        .lab {
            height: 30px;
            padding-top: 3px;
        }

    </style>


</head>

<body>

    <?php include 'components/header.php' ?>

    <br>
    <div class="container">
            <div style="display: grid;grid-template-columns: 80% 20%;gap: 20px;">
                <div style="text-align:center">
                    <label for="Filtro">Filters</label>
                    <select name="Filtro" id="filtro" class="form-control">
                        <option value="1" selected>Todos</option>
                        <option value="2">Com Mudanças</option>
                        <option value="3">Atrasados</option>
                        <option value="4">Aprovados</option>
                        <option value="5">Por Marca</option>
                        <option value="6">Por Fábrica</option>
                    </select>
                </div>
                <div style="text-align:center">
                <label for="Filtro">Order</label>
                    <select name="ordem" id="ordem" class="form-control">
                        <option value="ASC" selected>ASC</option>
                        <option value="DESC">DESC</option>
                    </select>
                </div>
            </div><br>
            <button class="btn btn-primary" onclick="loadDoc()">Apply Filter</button>
    </div>
    <br>
    <div class="card" id="prefiltro">

        <div class="inicio" style="border-bottom:1px solid black; padding:0 ; margin:0">
            <h4>Submissions</h4>
        </div>
        <div>

            <div class="grid5">
                <div class="campo">
                    <p class="notacao">Image</p>
                </div>
                <div class="campo">
                    <p class="notacao">Factory</p>
                </div>
                <div class="campo">
                    <p class="notacao">Reference</p>
                </div>
                <div class="campo">
                    <p class="notacao">Brand</p>
                </div>
                <div class="campo">
                    <p class="notacao">Link Download</p>
                </div>
                <div class="campo">
                    <p class="notacao">Deadline</p>
                </div>
            </div>
            <hr style="border-top:1px solid black; padding:0 ; margin:0">
            <?php
            if (empty($pedidos)) {
                echo "<h3 style='margin:1em'>Oops. No submissions yet!</h3>";
            } else {
                foreach ($pedidos as $p) {

                    $deadline = $p['deadlineAmostra'];
                    $deadline = strtotime($deadline);
                    $tempo = (($deadline - $hoje) / 86400);
                    $tempo = intval($tempo) + 1;

                    // TODO: Criar uma ideia de cores
                    if ($tempo <= 12 && $tempo > 8) {
                        $cor = "yellow";
                        array_push($atrasados, $p);
                    } elseif ($tempo <= 8) {
                        $cor = "red";
                        array_push($atrasados, $p);
                    } else {
                        $cor = "green";
                    }


                    echo '<div class="linhas">';
                    echo '<div class="grid5">';
                    echo '<div class="campo">';
                    echo '<a href="../imagens/' . $p["id_fabrica"] . '/' . $p["referencia"] . '.png"><img src="../imagens/' . $p["id_fabrica"] . '/' . $p["referencia"] . '.png" height=20 width=15></a>';
                    echo '</div>';
                    echo '<div class="campo">';
                    echo '<p class="lab">' . $p["nome"] . '</p>';
                    echo '</div>';
                    echo '<div class="campo">';
                    echo '<form action="pedido.php" method="POST" style="height:30px">';
                    echo '<input type="hidden" name="id" value="' . $p["id"] . '">';
                    echo '<button class="btn lab" style="height:30px;padding:0;margin:0">' . $p["referencia"] . '</button>';
                    echo '</form>';
                    echo '</div>';
                    echo '<div class="campo">';
                    echo '<p class="lab">' . $p["marca"] . '</p>';
                    echo '</div>';
                    echo '<div class="campo">';
                    echo '<a class="link" target="_blank" href="../controllers/downloadController.php?i=' . $p["id"] . '"><p class="lab">' . $p["linkDownload"] . '</p><a/>';
                    echo '</div>';
                    echo '<div class="campo" style="background-color:' . $cor . ';color:black">';
                    echo '<p class="lab">' . $p["deadlineAmostra"] . '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '<hr style="border-top:1px solid black; padding:0 ; margin:0">';
                }
            }
            ?>
        </div>
    </div>


    <div id="resposta">

    </div>

    <br><br>

    <script>
        function loadDoc() {
            var x = document.getElementById('filtro').value;
            var y = document.getElementById('ordem').value;
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                document.getElementById("prefiltro").style.display = "none";
                document.getElementById("resposta").innerHTML = this.responseText;
            }
            xhttp.open("GET", "components/busca.php?filtro="+ x +"&ordem=" + y, true);
            xhttp.send();
            
            // console.log(x , y)
        }
    </script>


</body>

</html>