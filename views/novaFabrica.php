<?php
include '../controllers/sessaoController.php';
include_once '../models/fabrica.php';

$fabrica = mostraFabricas($conn);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Factory</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <style>
        label{
            font-weight: bold;
        }
    </style>
</head>

<body>
    <?php
    include 'components/header.php';
    ?>
    <br>
    <div class="container">
        <form action="../controllers/fabricaController.php" method="post">
            <div style="display:grid; grid-template-columns: 50% 50%;gap:20px ">
                <div>
                    <label for="fabrica">Factory</label>
                    <input type="text" name="fabrica" class="form-control">
                </div>
                <div>
                    <label for="empresa">Company</label>
                    <select name="empresa" id="" class="form-control" required>
                        <option value=""> Choose One</option>
                        <option value="ABR">ABR</option>
                        <option value="UP">UP</option>
                        <option value="LUMINUS">LUMINUS</option>
                    </select>
                </div>
            </div>
            <br><br>
            <button class="btn btn-success">Send</button>
    </div>
    </form>


    <script>

        function Muda(){
            var x = document.getElementById("privilegio").value;
            var y = document.getElementById("fabrica");
            if(x === "gerente"){
                // y.style.display = "none";
                document.getElementById("fabrica").readOnly = false;
            }else{
                // y.style.display = "block";
            }
        }

    </script>
</body>

</html>