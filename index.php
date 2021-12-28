<?php

$base_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
$dir = "games";
$error = false;
$games = array();

if (!is_dir($dir)) {
    mkdir($dir);
}

$files = array_diff(scandir($dir), array('..', '.'));

foreach ($files as $file) {
    $info = pathinfo($file);

    if ($info["extension"] === "zip") {
        $games[] = array(
            "name" => $info["filename"],
            "url" => "$base_link/$dir/$info[basename]"
        );
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lan party games</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <main>
        <section>
            <h1>Lan party games</h1>
            <ul class="games-list">
                <?php
                foreach ($games as $game) {
                    echo "
                        <li class='games-list-item'>
                            <p class='games-list-item_name'>$game[name]</p> 
                            <a class='games-list-item_download' href='$game[url]' target='_blank'>Download</a>
                        </li>";
                }
                ?>
            </ul>
        </section>
    </main>
</body>

</html>