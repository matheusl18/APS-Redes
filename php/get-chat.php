<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $remetente_id = mysqli_real_escape_string($conn, $_POST['remetente_id']);
        $destinatario_id = mysqli_real_escape_string($conn, $_POST['destinatario_id']);
        $output = "";

        $sql = "SELECT * FROM mensagens 
                LEFT JOIN users ON users.unique_id = mensagens.remetente_msg_id
                WHERE (remetente_msg_id = {$remetente_id} AND destinatario_msg_id = {$destinatario_id})
                OR (remetente_msg_id = {$destinatario_id} AND destinatario_msg_id = {$remetente_id}) ORDER BY msg_id";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                if($row['remetente_msg_id'] === $remetente_id){
                    $output .= '<div class="chat outgoing">
                                <div class="details">
                                    <p>'. $row['msg'] .'</p>                       
                                </div>
                                </div>';
                }else{
                    $output .= '<div class="chat incoming">
                                <img src="php/imagens/'. $row['img'] .'" alt="">
                                <div class="details">
                                    <p>'. $row['msg'] .'</p>                       
                                </div>
                                </div>';
                }
            }
            echo $output;
        }

    }else{
        header("../login.php");
    }
?>