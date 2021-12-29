<?php 
$base_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";


function getGames($dir) {
    global $base_link;

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
                #"url" => "$base_link/$dir/$info[basename]",
                "url" => "./games/$info[basename]"
            );
        }
    }

    return $games;
}