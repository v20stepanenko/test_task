<?php
$testCount = 0;

if (isset($_POST['email'])) {
    echo json_encode($_POST['email'] . ' | ' . $_POST['pass']);
}
// $email = $_POST["email"];

// echo (json_encode($email));
?>