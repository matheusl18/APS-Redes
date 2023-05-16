<?php
    $conn = mysqli_connect("localhost", "root", "", "chat");
    if(!$conn){
        echo "Database Conectado" . mysqli_connect_error();
    }
?>