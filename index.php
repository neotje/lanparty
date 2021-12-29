<?php
require_once "php/games.php";

$dir = "games";
$games = getGames($dir);
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

    <script src="js/plupload.full.min.js"></script>
    <script src="js/script.js"></script>
</head>

<body>
    <main>
        <section>
            <h1>Lan party games</h1>
            <ul class="games-list">
                <?php

                if (count($games) == 0) {
                    echo "
                        <li class='games-list-item'>
                            <p class='games-list-item_name'>There is no game.</p> 
                        </li>";
                }

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

        <section>
            <h2>
                Game uploaden
            </h2>
            <form class="upload-form" id="gameUploadForm">
                <input class="upload-form_text" type="text" name="gameTitle" id="gameTitle" placeholder="Game title" required />
                
                <button type="button" class="upload-form_select">Select file</button>
                <span class="upload-form_filename"></span>

                <button type="submit" class="upload-form_submit">Upload game</button>
                <span class="upload-form_progress"></span>
            </form>
            <div id="container"></div>
        </section>
    </main>
</body>

</html>