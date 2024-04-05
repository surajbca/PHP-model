<?php
include 'connect.php';

extract($_POST);

if (
    isset($_POST['nameSend']) &&
    isset($_POST['emalSend']) &&
    isset($_POST['mobileSend']) &&
    isset($_POST['palceSend'])
) {
    $sql = "insert into `crud` (name,email, mobile,place)
    values ('$nameSend','$emailSend', '$mobileSend','$placeSend')";

    $result = mysqli_query($con, $sql);
}

?>