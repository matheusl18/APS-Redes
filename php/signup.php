<?php
    session_start();
    include_once "config.php";
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $senha = mysqli_real_escape_string($conn, $_POST['senha']);

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($senha) ){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");
            if(mysqli_num_rows($sql) > 0){
                echo "$email - Esse email já existe";
            }else{
                if(isset($_FILES['imagem'])){
                    $img_name = $_FILES['imagem']['name'];
                    $img_type = $_FILES['imagem']['type'];
                    $tmp_name = $_FILES['imagem']['tmp_name'];

                    $img_explode = explode('.', $img_name);
                    $img_ext = end($img_explode);

                    $extensions = ['png', 'jpeg', 'jpg'];
                    if(in_array($img_ext, $extensions) === true){
                        $time = time();
                        $new_img_name = $time.$img_name;
                        if(move_uploaded_file($tmp_name, "imagens/".$new_img_name)){
                            $status = "Online";
                            $random_id = rand(time(), 10000000);

                            $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, senha, img, status)
                                                VALUES ({$random_id}, '{$fname}', '{$lname}', '{$email}', '{$senha}', '{$new_img_name}', '{$status}')");

                                                if($sql2){
                                                    $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                                    if(mysqli_num_rows($sql3) > 0){
                                                        $row = mysqli_fetch_assoc($sql3);
                                                        $_SESSION['unique_id'] = $row['unique_id'];
                                                        echo "Sucesso";
                                                    }
                                                }else{
                                                    echo "Alguma coisa deu errado!";
                                                }
                        }
                    }else{
                        echo "Selecione uma imagem que seja - jpeg, jpg, png";
                    }
                }else{
                    echo "Selecione uma imagem";
                }
            }
        }else{
            echo "$email - esse não é um email valido";
        }
    }else{
        echo "Prencha todos os espaços";
    }
?>