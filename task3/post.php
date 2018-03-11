<?php
$testCount = 0;

if (isset($_POST)) {
    $jsonDec = json_decode(file_get_contents("php://input"));
    echo json_encode($jsonDec);
}


?>