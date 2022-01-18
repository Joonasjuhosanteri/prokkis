<?php

    require_once('utilities.php');


    $html = "<h2>Get titles by rating</h2>";

    $html .= '<form action="GET">';

    // Rating-pudotusvalikko

    $html .= createRatingDropDown();


    // Looppaa läpi tiedostot datasets-hakemistosta

    $path = 'datasets';

    if ($handle = opendir($path)) {

        while (false !== ($file = readdir($handle))) {

            if ('.' === $file) continue;

            if ('..' === $file) continue;



            $html .= '<div><input type="submit" value="' . basename($file, ".php") . '" formaction="' . $path . "/" . $file . '"></div>';

        }

        closedir($handle);

    }

    $html .= '</form>';

    // Luo painike, joka lähettää lomakkeen käsiteltävänä olevalle tiedostolle

    echo $html;