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
        .pointer{
            cursor: pointer;
        }
        .pointer:hover{
            font-weight: bold;
        }
        .text{
            margin-top: 0.6em;
            color: white;
        }
        .link{
            color: black;
        }
        .link:hover{
            color: black;
            text-decoration-line:none
        }
    </style>

</head>

<body>

    <header>
        <div class="header">
            <div class="centro" style="font-weight: bold">
                <p class="text">SISIMC</p>
            </div>
            <div class="divGrid">
                <div class="pointer">
                    <a class="link" href="novoPedido.php"><p class="text">New Submission</p></a>
                </div>
                <div class="pointer">
                    <a class="link" href="dashboard.php"> <p class="text">Submission Search</p></a>
                </div>
            </div>
            <div class="centro">
                <p class="text">Usuario</p>
            </div>
        </div>
    </header>


</body>

</html>