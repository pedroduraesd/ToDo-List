<?php
if (isset($_POST['nome'])) {
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $email = $_POST['email'];
    if ($_POST['senha'] != $_POST['senha2']) {
        header("Location: cadastro.php?nome=" . urlencode($nome) . "&sobrenome=" . urlencode($sobrenome) . "&email=" . urldecode($email) . "&errosenha=true");
        exit();
    }

    require_once "classes/rb.php";
    R::setup('mysql:host=sql303.infinityfree.com;dbname=if0_43060982_predo', 'if0_43060982', '5lhcorPR5rxc3t');

    if (R::testConnection()) {
        $usuario = R::dispense('usuario');

        $usuario->nome = $_POST['nome'] . $_POST['sobrenome'];
        $usuario->nick = $_POST['nome'];
        $usuario->email = $_POST['email'];
        $usuario->senha = $_POST['senha'];

        R::store($usuario);

        header("Location: login.php");
    }
}
