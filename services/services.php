<?php

require_once 'services/database.php';

$db = new DataBase();

if (isset($_POST['exhibitions'])) {

    $send = $db->GetExhibition($_POST['exhibitions']);
    $jsonData = json_encode($send);

    echo  $jsonData;
    die();
}
if (isset($_POST['dog_id'])) {

    $send = $db->GetDogJson($_POST['dog_id']);
    $jsonData = json_encode($send);

    echo  $jsonData;
    die();
}

function GetDogArray($dog)
{
    $portfolioItems = array();
    foreach ($dog as $item) {
            foreach ($item->GetPaths() as $path) {
                $portfolioItems[] = array(
                    "src" => $path,
                    "title" => $item->GetFullName(),
                    "filterClass" => $item->GetName()
                );
            }

    }
    return $portfolioItems;
}



