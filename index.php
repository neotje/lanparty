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
            <form action="upload.php" method="post" enctype="multipart/form-data" class="upload-form">
                <input class="upload-form_text" type="text" name="gameTitle" placeholder="Game title" required/>
                <input class="upload-form_file" type="file" name="gameZip" id="fileToUpload" required/>
                <input class="upload-form_submit" type="submit" value="Upload game" name="submit" />
            </form>
        </section>
    </main>
</body>

</html>