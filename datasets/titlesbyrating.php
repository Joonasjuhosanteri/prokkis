<?php
require_once('../db.php');
$rating = $_GET['average_rating'];
$conn = createDbConnection();
$sql = "SELECT `primary_title`
FROM `titles` INNER JOIN title_ratings
ON titles.title_id = title_ratings.title_id
WHERE average_rating = '.$rating.'
LIMIT 10;";
$prepare = $conn->prepare($sql);
$prepare->execute();
$rows = $prepare->fetchAll();
$html = '<h1>' . $rating . '</h1>';
$html .= '<ul>';
foreach($rows as $row) {
    $html .= '<li>' .  $row['primary_title'] . 
    '<li>';
}
$html .= '</ul>';
echo $html;


/* SELECT `primary_title`
FROM `titles` INNER JOIN title_ratings
ON titles.title_id = title_ratings.title_id
WHERE average_rating = 9
LIMIT 10; */