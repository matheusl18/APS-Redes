<?php
    session_start();
    include_once "config.php";
    $remetente_id = $_SESSION['unique_id'];
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE NOT unique_id = {$remetente_id}");
    $output = "";

    if(mysqli_num_rows($sql) == 1){
        $output .= "Sem usuarios disponivel";
    }elseif(mysqli_num_rows($sql) > 0){
       include_once "data.php";
    }
    echo $output;
?>