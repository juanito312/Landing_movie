<?php 
    # Definir la URL de la API
    const API_URL = "https://whenisthenextmcufilm.com/api";
    
    # Inicializar una nueva sesión de cURL; ch = cURL handle
    $ch = curl_init(API_URL);

    # Indicar que queremos recibir el resultado de la petición y no mostrarlo en pantalla
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    # Ejecutamos la petición y guaramos el resultado en $result
    $result = curl_exec($ch);

    #Aceder a los datos
    $data = json_decode($result, true);

    # Cerrar la sesión de cURL
    curl_close($ch);
?>

<head>
    <meta charset="UTF-8">
    <title>La proxima pelicula de Marvel</title>
    <meta name="description" content="La proxima pelicula de Marvel">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
    />
    <link rel="stylesheet" href="css/style.css">
</head>

<main>
   <section>
     <img src="<?= $data["poster_url"]; ?>" width="200" alt="Poster de <?= $data["title"]; ?>" 
     style="border-radius: 16px;"/> 
   </section>

   <hgroup>
        <h3><?= $data["title"]; ?> se estrena en <?= $data["days_until"];?> días</h3>
        <p class="realese_date">Fecha de estreno: <?= $data["release_date"];?></p>
        <p>La siguiente es: <span><?= $data["following_production"]["title"]; ?></span></p>
   </hgroup>
</main>
