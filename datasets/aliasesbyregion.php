<?php
    //muodosta tietokanta yhteys
    require_once('../db.php');
    $db = createDbConnection();
    // Lue region get-parametri muuttujaan
    $region = $_GET['region'];
    //Muodosta SQL-lause. Kyselyä ei vielä olla ajettu kantaan.
    $sql = "CALL GetAliasesByRegion('" . $region . "');";

    //Tarkistukset yms
    //Aja kysely kantaan
    $prepare = $db->prepare($sql);
    $prepare->execute();

    //Tallenna vastaus muuttujaan
    $rows = $prepare->fetchAll();
    
    // Testaus tulostus: var_dump($rows);
    // Tulosta sivulle
    // Tulostaa otsikon 
    $html = '<h1> Aliases by region' . $region . '</h1>';
    // Loopataan tietokannasta saadut rivit läpi
    $html .= '<ul>';
    foreach($rows as $row) {
        // Tulosta jokaiselle riville li-elementti
        $html .= '<li>' . $row['title'] .
        '</li>';
    }
    $html .= '</ul>';
    echo $html;