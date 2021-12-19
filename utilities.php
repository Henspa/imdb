<?php
// Funktio, mikä luo region-pudotusvalikon
function createRegionDropDown() {
    //muodosta tietokanta yhteys
    require_once('db.php');
    $db = createDbConnection();

    //Muodosta SQL-lause. Kyselyä ei vielä olla ajettu kantaan.
    $sql = "SELECT DISTINCT region FROM aliases;";

    //Tarkistukset yms
    //Aja kysely kantaan
    $prepare = $db->prepare($sql);
    $prepare->execute();

    //Tallenna vastaus muuttujaan
    $rows = $prepare->fetchAll();
    
    // Testaus tulostus: var_dump($rows);
    // Tulosta sivulle
    // Tulostaa otsikon 
    $html = '<select name="region">';
    // Loopataan tietokannasta saadut rivit läpi
    foreach($rows as $row) {
        $html .= '<option>' . $row['region'] . '</option>';
    }
    $html .= '</select>';
    return $html;
}    

// Funktio, mikä luo genre-pudotusvalikon
function createGenreDropDown() {
    //muodosta tietokanta yhteys
    require_once('db.php');
    $db = createDbConnection();

    //Muodosta SQL-lause. Kyselyä ei vielä olla ajettu kantaan.
    $sql = "SELECT DISTINCT genre FROM title_genres;";

    //Tarkistukset yms
    //Aja kysely kantaan
    $prepare = $db->prepare($sql);
    $prepare->execute();

    //Tallenna vastaus muuttujaan
    $rows = $prepare->fetchAll();
    
    // Testaus tulostus: var_dump($rows);
    // Tulosta sivulle
    // Tulostaa otsikon 
    $html = '<select name="genre">';
    // Loopataan tietokannasta saadut rivit läpi
    foreach($rows as $row) {
        $html .= '<option>' . $row['genre'] . '</option>';
    }
    $html .= '</select>';
    return $html;
}    

function viewBond() {
    //muodosta tietokanta yhteys
    require_once('db.php');
    $db = createDbConnection();

    //Muodosta SQL-lause. Kyselyä ei vielä olla ajettu kantaan.
    $sql = "SELECT * FROM BOND;";

    //Aja kysely kantaan
    $prepare = $db->prepare($sql);
    $prepare->execute();

    //Tallenna vastaus muuttujaan
    $rows = $prepare->fetchAll();

    foreach($rows as $row) {
        $html .= '<option>' . $row['name_id'] . ' ' . $row['name_'] . ' ' . $row['number_of_films'] . '</option>';
    }
    $html .= '</select>';
    return $html;
}
function viewBond2() {
    //muodosta tietokanta yhteys
    require_once('db.php');
    $db = createDbConnection();

    //Muodosta SQL-lause. Hyödynnetään luotua näkymää haussa. Kyselyä ei vielä olla ajettu kantaan.
    $sql = "SELECT * FROM BOND2;";

    //Aja kysely kantaan
    $prepare = $db->prepare($sql);
    $prepare->execute();

    //Tallenna vastaus muuttujaan
    $rows = $prepare->fetchAll();

    foreach($rows as $row) {
        $html .= '<option>' . $row['name_'] . ' ' . $row['title_id'] . ' ' . $row['primary_title'] .  ' ' . $row['start_year'] . '</option>';
    }
    $html .= '</select>';
    return $html;
}

/* function createEpisodeTitlesByRegion() {
    //muodosta tietokanta yhteys
    require_once('db.php');
    $db = createDbConnection();

    //Muodosta SQL-lause. Kyselyä ei vielä olla ajettu kantaan.
    $sql = "SELECT DISTINCT region FROM aliases;";

    //Tarkistukset yms
    //Aja kysely kantaan
    $prepare = $db->prepare($sql);
    $prepare->execute();

    //Tallenna vastaus muuttujaan
    $rows = $prepare->fetchAll();
    
    // Testaus tulostus: var_dump($rows);
    // Tulosta sivulle
    // Tulostaa otsikon 
    $html = '<select name="region">';
    // Loopataan tietokannasta saadut rivit läpi
    foreach($rows as $row) {
        $html .= '<option>' . $row['region'] . '</option>';
    }
    $html .= '</select>';
    return $html;
} */
