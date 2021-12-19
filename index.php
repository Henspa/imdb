<?php

    require_once('utilities.php');
    // Hakukriteerit
    $html = "<h2>Criteria</h2>";
    $html .= '<form action="GET">'; 
    // Alue-pudotusvalikko
    $html .= createRegionDropDown();
    
    // Genre-pudotusvalikko
    $html .= createGenreDropDown();

    // Looppaa läpi tiedostot datasets-hakemistosta
    $path = 'datasets';
    if ($handle = opendir($path)) {
        while (false !== ($file = readdir($handle))) {
            if ('.' === $file) continue;
            if ('..' === $file) continue;
            if ('...' === $file) continue;
            if ('....' === $file) continue;
            if ('.....' === $file) continue;

            $html .= '<div><input type="submit" value="' .
            basename($file, ".php") . '" formaction="' . $path
            . "/" . $file . '"></div>';
        }
        closedir($handle);
    }
    $html .= '</form>';
    // Luo painike, joka lähettää lomakkeen käsiteltävänä olevalle tiedostolle
    
    echo $html;