<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $remetente_id = mysqli_real_escape_string($conn, $_POST['remetente_id']);
        $destinatario_id = mysqli_real_escape_string($conn, $_POST['destinatario_id']);
        $mensagem = mysqli_real_escape_string($conn, $_POST['mensagem']);
    
        if(!empty($mensagem)){
            $sql = mysqli_query($conn, "INSERT INTO mensagens (destinatario_msg_id, remetente_msg_id, msg)
                                VALUES ({$destinatario_id}, {$remetente_id}, '{$mensagem}')") or die();
        }
    
    }else{
        header("../login.php");
    }
?>