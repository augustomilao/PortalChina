<?php
session_start();
include '../../models/conexao.php';
include '../../models/fabrica.php';
include '../../models/pedidos.php';
//* TODOS
//* COM Mudanças
//* Atrasados
//* Aprovados
//* POR Marca
//* POR FABRICA

$filtro = $_GET['filtro'];
$ordem  = $_GET['ordem'];
$hoje = time();

$mudanca = [];
$atrasados = [];
$aprovados = [];
$final = [];

if ($_SESSION['fabrica'] != 80) {
    $pedidos = buscaTodosPorFabrica($conn, $_SESSION['fabrica']);
} else {
    $pedidos = buscaTodosPedidos($conn);
}

//* MUDANÇA
foreach ($pedidos as $p) {
    if ($p['mudanca'] == 1) {
        array_push($mudanca, $p);
    }
}
//* MUDANÇA

//* ATRASADOS
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
}
//* ATRASADOS

//* APROVADOS
foreach ($pedidos as $p) {
    if ($p['finalizado'] == 1) {
        array_push($aprovados, $p);
    }
}
//* APROVADOS


//* POR MARCA
//* POR MARCA

//* POR FÁBRICA
//* POR FÁBRICA

switch($filtro){
    case 1:
        $final = $pedidos;
        break;
    case 2:
        $final = $mudanca;
        break;
    case 3:
        $final = $atrasados;
        break;
    case 4:
        $final = $aprovados;
        break;
    case 5:
        $final = $marcas;
        break;
    case 6:
        $final = $fabrica;
        break;
}


switch($ordem){
    case "ASC":
        break;
    case "DESC":
        $final = array_reverse($final);
        break;
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <div class="card">
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
            foreach ($final as $p) {

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
            ?>

        </div>
    </div>

    <br><br>


</body>

</html>