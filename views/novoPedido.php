<?php

include 'components/header.php';

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Submission</title>
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
            grid-template-columns: 30% 70%;
        }

        .centro {
            text-align: center;
        }
    </style>

</head>

<body>

    <br>
    <div style="width:550px;margin:auto">
        <img src="../assets/1stage.png" alt="stage" height="50">
    </div>
    <br>
    <div class="card">

        <div class="inicio">
            <h4>New Submission</h4>
        </div>


        <form action="">
            <div class="inside grid2">
                <div class="centro">
                    <div>
                        <img id="img" src="../assets/placeholder.jpg" height="297" width="210">
                    </div>
                    <br>
                    <input required type="file" id="input" name="imagem" >
                </div>
                <div class="">
                    <label class="negrito" for="referencia">Reference</label>
                    <input required class="form-control" type="text" name="referencia">
                    <label class="negrito" for="marca">Brand</label>
                    <input required class="form-control" type="text" name="marca">
                    <label class="negrito" for="linkDownload">Download Link</label>
                    <input required class="form-control" type="text" name="linkDownload">
                    <div style="display: grid;grid-template-columns: auto auto; gap:10px">
                        <div>
                            <label class="negrito" for="dataEnvio">Upload Date</label>
                            <input required class="form-control" type="text" name="dataEnvio">
                        </div>
                        <div>
                            <label class="negrito" for="dataDownload">Download Date</label>
                            <input required class="form-control" type="text" name="dataDownload">
                        </div>
                    </div>
                    <label class="negrito" for="deadlineAmostra">Sample Deadline</label>
                    <input required class="form-control" type="text" name="deadlineAmostra">
                </div>
            </div>
            <hr style="border-top: 3px solid #F8B32D;">
            <div style="text-align: right; margin-right:1.3em;">
                <button class="btn btn-primary">Submit Infos</button>
            </div>

        </form>
        <br>
    </div>
    <br><br>


    <script>
        let img = document.getElementById('img');
        let input = document.getElementById('input');

        input.onchange = (e) => {
            if (input.files[0])
                img.src = URL.createObjectURL(input.files[0]);
        }
    </script>
</body>

</html>