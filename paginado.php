<?php

    $ch  = curl_init(); // Iniciar o CURL
    if(empty($_GET['nextUrl']) && empty($_GET['previousUrl'])){
        curl_setopt($ch, CURLOPT_URL, "https://pokeapi.co/api/v2/pokemon"); // Aqui
    }else{
        curl_setopt($ch, CURLOPT_URL, $_GET['nextUrl']); // Aqui
    }

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $response = curl_exec($ch);
    $response = json_decode($response,true);

    $rows = 20;
    $totalRegisters = $response['count'];
    $totalPages = ceil($totalRegisters/$rows);

    $pokemons = $response['results'];
    $previousUrl = $response['previous'];
    $nextUrl = $response['next'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <?php
                foreach ($pokemons as $key => $value) {
            ?>
            <div class="col-md-4">
                <div class="card mt-3">
                    <!-- <img class="card-img-top" src="<?=$value['url']?>" alt="Card image cap"> -->
                    <div class="card-body">
                        <h5 class="card-title"><?=$value['']?></h5>
                    </div>
                </div>
            </div>
            <?php
                }
            ?>

            <div class="col-md-12"></div>
            <div class="col-md-6">
                <a href="paginado.php?previousUrl=<?=$previousUrl?>" class="href">Anterior</a>
            </div>
            <div class="col-md-6">
                <a href="paginado.php?nextUrl=<?=$nextUrl?>">Proximo</a>
            </div>
        </div>
    </div>
</body>
</html>