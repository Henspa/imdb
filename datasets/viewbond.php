<?php

/* 
CREATE VIEW BOND(name_id,name_,number_of_films)
AS SELECT N.name_id, N.name_, COUNT(*) AS number_of_films
FROM Names_ AS N, Had_role AS H, Titles AS T
WHERE H.role_ LIKE 'James Bond%'
AND T.title_type LIKE 'movie'
AND T.title_id = H.title_id
AND N.name_id = H.name_id
GROUP BY N.name_id;
*/

//muodosta tietokanta yhteys
require_once('../db.php');
$db = createDbConnection();

//Muodosta SQL-lause. Kyselyä ei vielä olla ajettu kantaan.
$sql = "SELECT * FROM BOND;";

//Tarkistukset yms
//Aja kysely kantaan
$prepare = $db->prepare($sql);
$prepare->execute();

//Tallenna vastaus muuttujaan
$rows = $prepare->fetchAll();

$html = '<h1> Actors who Played James Bond and in how many movies</h1>';
// Loopataan tietokannasta saadut rivit läpi
$html .= '<ul>';
foreach($rows as $row) {
    // Tulosta jokaiselle riville li-elementti
    $html .= '<li>' . $row['name_id'] . ' ' . $row['name_'] . ' ' . $row['number_of_films'] . 
    '</li>';
}
$html .= '</ul>';
echo $html;