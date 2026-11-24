<?php
$errocredenciais = $_GET['errocredenciais'] ?? '';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <div>
        <form action="autenticardados.php" method="post">
            <fieldset>
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" required autofocus>

                <label for="senha">Senha</label>
                <input type="password" name="senha" id="senha" required>

                <input type="submit" value="Entrar">

                <?php
                if ($errocredenciais == true) {
                    echo "<p>Os dados estão errados</p>";
                }
                ?>
            </fieldset>
        </form>
        <p>Não tem conta? <a href="cadastro.php">Cadastrar</a></p>
    </div>
</body>

</html>