<?php
include 'model.php';

if ($_GET ['tableName'] === "Actors"){
    echo json_encode ( $theDBA->getAllActors ($_GET['substring']) );
} elseif ($_GET ['tableName'] === "Movies"){
    echo json_encode ( $theDBA->getAllMovies ($_GET['substring']) );
} elseif ($_GET ['tableName'] === "Roles"){
    echo json_encode ( $theDBA->getAllRoles ($_GET['substring']) );
}
?>