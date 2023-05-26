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
            grid-template-columns: 50% 50%;
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
    </style>

</head>

<body>

    <header>
        <div class="header">
            <div class="centro" style="font-weight: bold">
                <p class="text">SISIMC</p>
            </div>

            <!--  
                //TODO: Se for um usuário ADM, tem que ter a opção New Submission. Se não, ter apenas a Submission Search
            -->
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
                 echo '</div>';
            }?>

            <div class="centro">
                <a class="link" href="../controllers/logoutController.php">
                    <p class="text">Logout</p>
                </a>
            </div>
        </div>
    </header>


</body>

</html>