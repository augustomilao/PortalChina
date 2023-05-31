<?php
include_once '../controllers/sessaoController.php';

verificaSessao();
// var_dump($_SESSION);

include '../models/pedidos.php';

// 80 = Sinal para ver todas
if($_SESSION['fabrica']!= 80){
    $pedidos = buscaTodosPorFabrica($conn, $_SESSION['fabrica']);
}else{
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
        p{
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
        .grid5{
            display: grid;
            grid-template-columns: 5% 20% 20% 20% 20% 15%;
        }
        .campo{
            text-align: center;
            height: 30px;
        }
        .notacao{
            font-weight: bold;
        }
        .linhas{
            height: 30px;
        }

        .link{
            color: black;
        }
        .link:hover{
            color: black;
        }
        .grid3{
            display: grid;
            grid-template-columns: auto auto auto;
            gap: 1em;
            margin: auto;
            width: 30%;
        }
        .escolhas{
            border: 1px solid black;
            border-radius: 10px;
            cursor: pointer;
        }
        .lab{
            height: 30px;
            padding-top: 3px;
        }

    </style>


</head>

<body>

    <?php include 'components/header.php' ?>

    <br>
        <div class="grid3">
            <img class="escolhas" width="60" src="../assets/atrasado.png" alt="">
            <img class="escolhas" width="60" src="../assets/normal.png" alt="">
            <img class="escolhas" width="60" src="../assets/finalizado.png" alt="">
        </div>
    <br>
    <div class="card">
        
        <div class="inicio">
            <h4>Submissions</h4>
        </div>
        <div>
        <hr style="border-top:1px solid black; padding:0 ; margin:0">
            <?php
            if(empty($pedidos)){
                echo "<h3 style='margin:1em'>Oops. No submissions yet!</h3>";
            }else{
            foreach($pedidos as $p){

                $deadline = $p['deadlineAmostra'];
                $deadline = strtotime($deadline);
                $tempo = (($deadline - $hoje)/86400);
                $tempo = intval($tempo) + 1;

                // TODO: Criar uma ideia de cores
                if($tempo <= 12 && $tempo > 8){
                    $cor = "yellow";
                    array_push($atrasados, $p);
                }elseif($tempo <= 8){
                    $cor = "red";
                    array_push($atrasados, $p);
                }else{
                    $cor = "green";
                    
                }


                echo '<div class="linhas">';
                    echo '<div class="grid5">';
                        echo '<div class="campo">';
                            echo '<img src="../imagens/'.$p["id_fabrica"].'/'.$p["referencia"].'.png" height=20>';
                        echo '</div>';
                        echo '<div class="campo">';
                            echo '<p class="lab">'.$p["nome"].'</p>';
                        echo '</div>';
                        echo '<div class="campo">';
                            echo '<form action="pedido.php" method="POST" style="height:30px">';
                            echo '<input type="hidden" name="id" value="'.$p["id"].'">';
                            echo '<button class="btn lab" style="height:30px;padding:0;margin:0">'.$p["referencia"].'</button>';
                            echo '</form>';
                            echo '</div>';
                        echo '<div class="campo">';
                            echo '<p class="lab">'.$p["marca"].'</p>';
                        echo '</div>';
                        echo '<div class="campo">';
                            echo '<a class="link" target="_blank" href="../controllers/downloadController.php?i='.$p["id"].'"><p class="lab">'.$p["linkDownload"].'</p><a/>';
                        echo '</div>';
                        echo '<div class="campo" style="background-color:'.$cor.';color:black">';
                            echo '<p class="lab">'.$p["deadlineAmostra"].'</p>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
                echo '<hr style="border-top:1px solid black; padding:0 ; margin:0">';
            }
        }
            ?>
        </div>
    </div>

    <br><br>
    
    <div class="card">
    <a></a>
        <div class="inicio">
            <h4> Only the close to deadline submissions</h4>
        </div>
        <div>
            <br>
            <?php

            foreach($atrasados as $c){

                $deadline = $c['deadlineAmostra'];
                $deadline = strtotime($deadline);
                $tempo = (($deadline - $hoje)/86400);
                $tempo = intval($tempo) + 1;

                // TODO: Criar uma ideia de cores
                if($tempo <= 12 && $tempo > 8){
                    $cor = "yellow";
                    array_push($atrasados, $c);
                }elseif($tempo <= 8){
                    $cor = "red";
                    array_push($atrasados, $c);
                }else{
                    $cor = "green";
                    
                }


                echo '<div>';
                    echo '<div class="grid5">';
                        echo '<div class="campo">';
                            echo '<p class="notacao">Image</p>';
                            echo '<img src="../imagens/'.$c["id_fabrica"].'/'.$c["referencia"].'.png" width=50>';
                        echo '</div>';
                        echo '<div class="campo">';
                            echo '<p class="notacao">Factory</p>';
                            echo '<p class="lab">'.$c["nome"].'</p>';
                        echo '</div>';
                        echo '<div class="campo">';
                            echo '<p class="notacao">Reference</p>';
                            echo '<form action="pedido.php" method="POST">';
                            echo '<input type="hidden" name="id" value="'.$c["id"].'">';
                            echo '<button class="btn lab">'.$c["referencia"].'</button>';
                            echo '</form>';
                            echo '</div>';
                        echo '<div class="campo">';
                            echo '<p class="notacao">Brand</p>';
                            echo '<p class="lab">'.$c["marca"].'</p>';
                        echo '</div>';
                        echo '<div class="campo">';
                            echo '<p class="notacao">Link Download</p>';
                            echo '<a class="link" target="_blank" href="../controllers/downloadController.php?i='.$c["id"].'"><p class="lab">'.$c["linkDownload"].'</p><a/>';
                        echo '</div>';
                        echo '<div class="campo" style="background-color:'.$cor.';color:black">';
                            echo '<p class="notacao">Deadline</p>';
                            echo '<p class="lab">'.$c["deadlineAmostra"].'</p>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
                echo '<hr>';
            }

            ?>
        </div>
    </div>
    <br><br>    

</body>

</html>