<?php
$nome = $_GET['nome'] ?? '';
$sobrenome = $_GET['sobrenome'] ?? '';
$email = $_GET['email'] ?? '';
$erroSenha = $_GET['errosenha'] ?? 0;
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <form action="processardados.php" method="post">
        <fieldset>
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" value="<?= $nome ?>" required autofocus>

            <label for="sobrenome">Sobrenome</label>
            <input type="text" name="sobrenome" id="sobrenome" value="<?= $sobrenome ?>" required>

            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" value="<?= $email  ?>" required>

            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha" required>

            <label for="senha2">Repetir a senha</label>
            <input type="password" name="senha2" id="senha2" required>

            <?php
            if ($erroSenha == true) {
                echo "<p>As senhas estão diferentes</p>";
            }
            ?>

            <input type="submit" value="Cadastrar">
        </fieldset>
    </form>
</body>

</html>