<?php
include '../controllers/sessaoController.php';
include_once '../models/fabrica.php';
include_once '../models/usuario.php';

$fabrica = mostraFabricas($conn);
$usuarios = todosUsuarios($conn);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <style>
        label {
            font-weight: bold;
        }

        table,
        td,
        th {
            border: 1px solid black;
            text-align: center;
            padding: 0.5em;
        }
    </style>
</head>

<body>
    <?php
    include 'components/header.php';
    ?>
    <br>
    <div class="container">
        <form action="../controllers/usuarioController.php" method="post">
            <div style="display:grid; grid-template-columns: 50% 50%;gap:20px ">
                <div>
                    <label for="usuario">User</label>
                    <input type="text" name="usuario" class="form-control">
                </div>
                <div>
                    <label for="senha">Password</label>
                    <input type="password" name="senha" class="form-control">
                </div>
            </div>
            <br>
            <div style="display:grid; grid-template-columns: 50% 50%;gap:20px">
                <div>
                    <label for="privilegio">Role</label>
                    <select class="form-control" name="privilegio" id="privilegio" required onChange="Muda()">
                        <option value="" selected>Choose One</option>
                        <option value="gerente">Manager</option>
                        <option value="fabrica">Factory</option>
                    </select>
                </div>
                <div id="fabrica">
                    <label for="fabrica">Factory</label>
                    <select class="form-control" name="fabrica">
                        <option value="" selected>Choose One</option>
                        <?php

                        foreach ($fabrica as $f) {
                            echo '<option value="' . $f["id"] . '">' . $f["nome"] . '</option>';
                        }

                        ?>
                    </select>
                </div>
            </div>
            <br><br>
            <button class="btn btn-success">Send</button>

            <hr>

            <div style="text-align: center;">
                <h4>Factories</h4>
                <table style="width: 300px;margin:auto">
                    <tr>
                        <th>Factory</th>
                        <th>Delete Link</th>
                    </tr>
                    <?php

                    foreach ($usuarios as $f) {
                        echo '<tr>';
                        echo '<td>' . $f['usuario'] . '</td>';
                        echo '<td style="background-color:brown;color:white;cursor:pointer;"><a onclick="checkDelete(' . $f["id"] . ')">Excluir</a></td>';
                        echo '</tr>';
                    }

                    ?>

                </table>
            </div>

            <br><br>
    </div>
    </form>


    <script>
        function Muda() {
            var x = document.getElementById("privilegio").value;
            var y = document.getElementById("fabrica");
            if (x === "gerente") {
                y.style.display = "none";
            } else {
                y.style.display = "block";
            }
        }

        function checkDelete(a) {
            let text = "Quer realmente excluir?"
            if (confirm(text) == true) {
                window.location.href = "../controller/apagarUsuario.php?id=" + a;
            } else {

            }


        }
    </script>
</body>

</html>