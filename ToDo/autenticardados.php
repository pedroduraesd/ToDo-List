<?php
session_start();
require_once "classes/rb.php";
R::setup('mysql:host=sql303.infinityfree.com;dbname=if0_43060982_predo', 'if0_43060982', '5lhcorPR5rxc3t');

$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

$usuarioaux = R::findOne('usuario', ' email = ? AND senha = ?', [$email, $senha]);

if ($usuarioaux != null) {
    $_SESSION['logado'] = true;
    $_SESSION['nome'] = $usuarioaux->nick;
    $_SESSION['id'] = $usuarioaux->id;

    header("Location: index.php");
    exit();
} else {
    header("Location: login.php?errocredenciais=true");
    exit();
}
