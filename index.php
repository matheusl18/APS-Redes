<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
</head>
<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        header("location: users.php");
    }
?>
<body>
    <div class="wrapper">
        <section class="form singup">
            <header>Comunicação de Rede</header>
            <form action="#" enctype="multipart/form-data">
                <div class="error-txt"></div>
                <div class="name-details">
                    <div class="field input">
                        <label>Nome</label>
                        <input type="text" name="fname" placeholder="Nome" require>
                    </div>
                    <div class="field input">
                        <label>Sobrenome</label>
                        <input type="text" name="lname" placeholder="Sobrenome" require>
                    </div>
                </div>
                <div class="field input">
                    <label>Email</label>
                    <input type="text" name="email" placeholder="Email" require>
                </div>
                <div class="field input">
                    <label>Senha</label>
                    <input type="password" name="senha" placeholder="Senha" require>
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field image">
                    <label>Selecione uma imagem</label>
                    <input type="file" name="imagem" require>
                </div>
                <div class="field button">
                    <input type="submit" value="Continuar">
                </div>
            </form>
            <div class="link">Já tem uma conta? <a href="login.php">Login</a></div>
        </section>
    </div>
    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/signup.js"></script>
</body>
</html>