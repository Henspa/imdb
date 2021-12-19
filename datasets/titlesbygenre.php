<?php
    //muodosta tietokanta yhteys
    require_once('../db.php');
    $db = createDbConnection();
    // Lue genre get-parametri muuttujaan
    $genre = $_GET['genre'];
    //Muodosta SQL-lause. Kyselyä ei vielä olla ajettu kantaan.
    $sql = "SELECT `primary_title`
    FROM `titles` INNER JOIN title_genres
    ON titles.title_id = title_genres.title_id
    WHERE genre LIKE '%" . $genre . "%'
    LIMIT 10;";

    //Tarkistukset yms
    //Aja kysely kantaan
    $prepare = $db->prepare($sql);
    // Bindaa arvot parametriin
    //$prepare->bindParam(':genre', $genre, PDO::PARAM_STR);
    $prepare->execute();

    //Tallenna vastaus muuttujaan
    $rows = $prepare->fetchAll();
    
    // Testaus tulostus: var_dump($rows);
    // Tulosta sivulle
    // Tulostaa otsikon 
    $html = '<h1>' . $genre . '</h1>';
    // Loopataan tietokannasta saadut rivit läpi
    $html .= '<ul>';
    foreach($rows as $row) {
        // Tulosta jokaiselle riville li-elementti
        $html .= '<li>' . $row['primary_title'] .
        '</li>';
    }
    $html .= '</ul>';
    echo $html;