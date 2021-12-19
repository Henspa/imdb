<?php

/* 
CREATE VIEW BOND2(name_,title_id,primary_title,start_year)
AS SELECT BOND.name_, T.title_id, T.primary_title, T.start_year
FROM BOND, Titles AS T, Had_role AS H
WHERE BOND.name_id = H.name_id
AND H.role_ LIKE 'James Bond%'
AND T.title_id = H.title_id
AND T.title_type LIKE 'movie'
ORDER BY T.start_year DESC;
*/

//muodosta tietokanta yhteys
require_once('../db.php');
$db = createDbConnection();

//Muodosta SQL-lause. Kyselyä ei vielä olla ajettu kantaan.
$sql = "SELECT * FROM BOND2;";

//Tarkistukset yms
//Aja kysely kantaan
$prepare = $db->prepare($sql);
$prepare->execute();

//Tallenna vastaus muuttujaan
$rows = $prepare->fetchAll();

$html = '<h1> Actors who Played James Bond, name of the movie and year.</h1>';
// Loopataan tietokannasta saadut rivit läpi
$html .= '<ul>';
foreach($rows as $row) {
    // Tulosta jokaiselle riville li-elementti
    $html .= '<li>' . $row['name_'] . ' ' . $row['title_id'] . ' ' . $row['primary_title'] .  ' ' . $row['start_year'] .
    '</li>';
}
$html .= '</ul>';
echo $html;