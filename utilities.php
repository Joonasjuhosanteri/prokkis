<?php

function createRatingDropDown() { 
    require_once('db.php');

    $conn = createDbConnection();

    $sql = "SELECT DISTINCT average_rating FROM title_ratings;";

    $prepare = $conn->prepare($sql);

    $prepare->execute();

    $rows = $prepare->fetchAll();

    $html = '<select name="average_rating">';

    foreach($rows as $row) {


        $html .= '<option>' . $row['average_rating'] . '</option>';

    }

    $html .= '</select>';

    return $html;


}