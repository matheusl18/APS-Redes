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
<body>
    <div class="wrapper">
        <section class="form login">
            <header>Comunicação de Rede</header>
            <form action="#">
                <div class="error-txt"></div>
                <div class="field input">
                    <label>Email</label>
                    <input type="text" name="email" placeholder="Email">
                </div>
                <div class="field input">
                    <label>Senha</label>
                    <input type="password" name="senha" placeholder="Senha">
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field button">
                    <input type="submit" value="Continuar">
                </div>
            </form>
            <div class="link">Não tem uma conta ainda? <a href="index.php">Crie uma</a></div>
        </section>
    </div>
    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/login.js"></script>
</body>
</html>