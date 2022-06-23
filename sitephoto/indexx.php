<?php
	require 'conexao.php';
    session_start();
?>
<!--<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login | IMKWR</title>
</head>
<body>
	<form action="login.php" method="POST">
		<input type="text" name="usuario"/>
		<input type="password" name="senha"/>
		<input type="submit" value="entrar"/>

	</form>
	
</body>
</html>-->


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="estilo.css">
    <title>Autenticacao</title>
</head>

<body> 
    <div class="container" >
        <div class="Logo-form">
            <div class="titulo" style="text-align: center;">IK | Fotografia</div>
            <?php if (isset($error)) : ?>
                    <?php echo '<script>alert("Username ou senha errada!");</script>'; ?>
                <?php endif; ?>
            <form action="login.php" method="POST">

                <div class="input-box">
                    <i class="fa fa-user"></i>
                    <input type="text" placeholder="Nome do usuario"  name="usuario" required>
                </div>

                <div class="input-box">
                    <i class="fa fa-lock"></i>
                    <input type="password" placeholder="Password" name="senha" required>
                </div>

                <div class="forgot"> <a href="#">Esqueceste a senha?</a> </div>
                
                <div class="input-box">
                    <input type="submit" value="Entrar">
                </div>
                <div class="dividir"> ou </div>
                <div class="medias-socias">
                    <i class="fa fa-facebook"></i>
                    <i class="fa fa-instagram"></i>
                    <i class="fa fa-github"></i>
                </div>
                <div class="sigup-text">
                    Não tens conta? <a href="criarUser.php">Criar conta!</a>
                </div>
            </form>
        </div>
        
    </div>
</body>

</html>