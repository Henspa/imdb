<?php

/* 
DELIMITER //

CREATE PROCEDURE GetEpisodeTitlesByRegion(
   IN regionName VARCHAR(4)
)

BEGIN

SELECT primary_title 
FROM titles AS T, episode_belongs_to AS E, aliases AS A
WHERE t.title_id = e.episode_title_id
AND t.title_id = a.title_id
AND (region = regionName)
Group BY t.title_id ORDER BY title 
LIMIT 10;

END //

DELIMITER ;
*/

//muodosta tietokanta yhteys
require_once('../db.php');
$db = createDbConnection();
// Lue region get-parametri muuttujaan
$region = $_GET['region'];
//Muodosta SQL-lause. Kyselyä ei vielä olla ajettu kantaan.
$sql = "CALL GetEpisodeTitlesByRegion('" . $region . "');";

//Tarkistukset yms
//Aja kysely kantaan
$prepare = $db->prepare($sql);
$prepare->execute();

//Tallenna vastaus muuttujaan
$rows = $prepare->fetchAll();

// Testaus tulostus: var_dump($rows);
// Tulosta sivulle
// Tulostaa otsikon 
$html = '<h1> Episode titles by region' . $region . '</h1>';
// Loopataan tietokannasta saadut rivit läpi
$html .= '<ul>';
foreach($rows as $row) {
    // Tulosta jokaiselle riville li-elementti
    $html .= '<li>' . $row['primary_title'] .
    '</li>';
}
$html .= '</ul>';
echo $html;