<?php

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <style>
        .header {
            height: 3em;
            background-color: #491F68;
            display: grid;
            grid-template-columns: 20% 60% 20%;
        }

        .divGrid {
            display: grid;
            grid-template-columns: 33% 33% 33%;
            text-align: center;
        }

        .centro {
            text-align: center;
        }

        .pointer {
            cursor: pointer;
        }

        .pointer:hover {
            font-weight: bold;
        }

        .text {
            margin-top: 0.6em;
            color: white;
        }

        .link {
            color: black;
        }

        .link:hover {
            color: black;
            text-decoration-line: none
        }

        .text2{
            color: white;
            margin-top: 0.1em;
        }
    </style>

</head>

<body>

    <header>
        <div class="header">
            <div class="centro" style="font-weight: bold">
                <a href="/PortalChina/views/dashboard.php"><p class="text">SISIMC</p></a>
            </div>

            <?php
            if ($_SESSION['privilegio'] == "fabrica") {
                echo '<div class="pointer" style="text-align: center;">';
                echo '<a class="link" href="dashboard.php"> <p class="text">Submission Search</p></a>';
                echo '</div>';
            } else {
                echo '<div class="divGrid">';
                echo '<div class="pointer">';
                echo '    <a class="link" href="novoPedido.php">';
                echo '        <p class="text">New Submission</p>';
                echo '    </a>';
                echo '</div>';
                echo '<div class="pointer">';
                echo '    <a class="link" href="dashboard.php">';
                echo '        <p class="text">Submission Search</p>';
                echo '    </a>';
                echo '</div>';
                echo '<div class="pointer">';
                echo '    <a>';
                echo '        <p onclick=ToogleDIV() class="text" >New Register</p>';
                echo '    </a>';
                echo '</div>';
                echo '</div>';
            } ?>

            <div class="centro">
                <a class="link" href="../controllers/logoutController.php">
                    <p class="text">Logout</p>
                </a>
            </div>
        </div>
    </header>
    <div id="drop" style="display: none;">
            <div style="display: grid;grid-template-columns: auto auto auto;background-color:#3E2080;color:white;height:2em;padding:0.2em 0; border-top:1px solid black">
                <div style="text-align: center;">
                   <a class="link" href="novaMarca.php"><p class="text2">New Brand</p></a>
                </div>
                <div style="text-align: center;">
                    <a class="link" href="novaFabrica.php"><p class="text2">New Factory</p></a>
                </div>
                <div style="text-align: center;">
                    <a class="link" href="novoUsuario.php"><p class="text2">New User</p></a>
                </div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
    </div>


    <script>
        function ToogleDIV(){
            var a = document.getElementById('drop').style.display;
            if(a == "none"){
                document.getElementById('drop').style.display = "block";
            }else{
                document.getElementById('drop').style.display = "none";
            }
        }
    </script>
</body>

</html>