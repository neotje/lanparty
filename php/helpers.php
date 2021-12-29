<?php

function redirect($localPath) {
    $base_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";

    header("Location: $base_link/$localPath");
}