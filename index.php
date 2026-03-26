<?php
const API_URL = "https://whenisthenextmcufilm.com/api";

$response = curl_init(API_URL);
curl_setopt($response, CURLOPT_RETURNTRANSFER, true);
//importante para desarrollo desabilitar la verificacion del certificado
curl_setopt($response, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($response, CURLOPT_SSL_VERIFYHOST, false);

$result = curl_exec($response);
$response = null;
$data = json_decode($result, true);

?>

<head>
    <title>La próxima película de Marvel</title>
    <meta name="description" content="La próxima película de Marvel">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<main>
    <section>
        <img src="<?= $data["poster_url"]; ?>" width="200" alt="Poster de <?= $data["title"] ?>" style="border-radius: 16px;">
    </section>

    <hgroup>
        <h3><?= $data["title"]; ?> se estrena en <?= $data["days_until"] ?></h3>
        <h3><?= $data["title"]; ?> se estrena en <?= $data["days_until"] ?> días</h3>
        <p>Fecha de estreno: <?= $data["release_date"]; ?></p>
        <p>La siguiente es: <?= $data["following_production"]["title"]; ?></p>
    </hgroup>
</main>

<style>
    :root {
        color-scheme: light dark;
    }

    body {
        display: grid;
        place-content: center;
    }

    section {
        display: flex;
        justify-content: center;
        text-align: center;
    }

    hgroup {
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }
    img {
        margin: 0 auto;
    }
</style>