<?php
    session_start();
    include_once "config.php";
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $senha = mysqli_real_escape_string($conn, $_POST['senha']);
    

    if(!empty($email) && !empty($senha)){
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' AND senha = '{$senha}'");
        if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
            $status = "Online";
            $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
            if($sql2){
                $_SESSION['unique_id'] = $row['unique_id'];
                echo "Sucesso";
            }
        }else{
            echo "Email ou senha está incorreto";
        }

    }else{
        echo "Prencha todos os espaços";
    }
?>