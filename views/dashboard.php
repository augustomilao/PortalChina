<?php
include '../controllers/sessaoController.php';

verificaSessao();


include '../models/pedidos.php';

$pedidos = buscaTodosPedidos($conn);


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
        .grid5{
            display: grid;
            grid-template-columns: 222px 222px 222px 222px 222px 222px;
        }
        .campo{
            text-align: center;
        }
        .notacao{
            font-weight: bold;
        }
        .lab{
        padding-top: 12px;
        }

        .link{
            color: black;
        }
        .link:hover{
            color: black;
        }

    </style>


</head>

<body>

    <?php include 'components/header.php' ?>

    <br>

    <div class="card">

        <div class="inicio">
            <h4>Submissions</h4>
        </div>
        <div>
            <br>
            <?php

            foreach($pedidos as $p){
                echo '<div>';
                    echo '<div class="grid5">';
                        echo '<div class="campo">';
                            echo '<p class="notacao">Image</p>';
                            echo '<img src="../imagens/'.$p["id"].'/'.$p["referencia"].'.png" width=50>';
                        echo '</div>';
                        echo '<div class="campo">';
                            echo '<p class="notacao">Factory</p>';
                            echo '<p class="lab">'.$p["nome"].'</p>';
                        echo '</div>';
                        echo '<div class="campo">';
                            echo '<p class="notacao">Reference</p>';
                            echo '<form action="pedido.php" method="POST">';
                            echo '<input type="hidden" name="id" value="'.$p["id"].'">';
                            echo '<button class="btn lab">'.$p["referencia"].'</button>';
                            echo '</form>';
                            echo '</div>';
                        echo '<div class="campo">';
                            echo '<p class="notacao">Brand</p>';
                            echo '<p class="lab">'.$p["marca"].'</p>';
                        echo '</div>';
                        echo '<div class="campo">';
                            echo '<p class="notacao">Link Download</p>';
                            echo '<a class="link" target="_blank" href="../controllers/downloadController.php?i='.$p["id"].'"><p class="lab">'.$p["linkDownload"].'</p><a/>';
                        echo '</div>';
                        echo '<div class="campo">';
                            echo '<p class="notacao">Deadline</p>';
                            echo '<p class="lab">'.$p["deadlineAmostra"].'</p>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
                echo '<hr>';
            }

            ?>
        </div>
    </div>

</body>

</html>