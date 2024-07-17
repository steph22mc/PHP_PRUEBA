<?php

# Inicializar una nueva sesion de CURL; ch = cURL handle
const API_URL = "https://www.whenisthenextmcufilm.com/api";
$ch = curl_init(API_URL);
// Indicar que queremos recibir el resultado de la peticion y no mostrarla en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
/**
 * Ejecutar la peticion
 * y guardamos el resultado
 */
$result = curl_exec($ch);

// Una alternativa seria utilizar file_get_contents
// $result = file_get_contents(API_URL);
// Si solo quieres hacer un GET de una API

$data = json_decode($result, true);
curl_close($ch);

// var_dump($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Centered viewport --> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"/>
    <title>MCV</title>

    <style>
    :root{
        color-scheme: light dark;
    }

    body{
        display: grid;
        place-content: center;
    }
    pre{
        font-size: 8px;
        overflow: scroll;
        height: 250px; 
    }
    img{
        border-radius: 16px;
    }

    section{
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
</head>
<body>
    <main>
        <!-- <pre>
            <?php var_dump($data);?>
        </pre> -->
        <section>
            <img src="<?= $data["poster_url"];?>" width="300" alt="Poster de <?= $data["title"];?>">
        </section>

        <hgroup>
            <h3><?= $data["title"];?> Se estrena en <?= $data["days_until"];?></h3>
            <p>Fecha de estreno <?= $data["release_date"];?></p>
            <p>La siguiente es: <?= $data["following_production"]["title"];?></p>
        </hgroup>
    </main>
</body>
</html>