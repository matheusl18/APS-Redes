<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $mensagem = mysqli_real_escape_string($conn, $_POST['mensagem']);
    
        if(!empty($mensagem)){
            $sql = mysqli_query($conn, "INSERT INTO mensagens (incoming_msg_id, outgoing_msg_id, msg)
                                VALUES ({$incoming_id}, {$outgoing_id}, '{$mensagem}')") or die();
        }
    
    }else{
        header("../login.php");
    }
?>