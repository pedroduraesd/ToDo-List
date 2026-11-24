<?php
session_start();
require_once "../classes/rb.php";

if (!isset($_SESSION['logado']) || $_SESSION['logado'] != true) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['tarefa'])) {
    if (trim($_GET['tarefa'] ?? '') == '') {
        header("Location: index.php?errovazio=true");
        exit();
    }
    R::setup('mysql:host=sql303.infinityfree.com;dbname=if0_43060982_predo', 'if0_43060982', '5lhcorPR5rxc3t');
    if (R::testConnection()) {
        $usuario = R::load('usuario', $_SESSION['id']);

        if ($usuario->id) {
            $tarefa = R::dispense('tarefa');
            $tarefa->descricao = $_GET['tarefa'];
            $tarefa->concluida = false;
            $tarefa->usuario = $usuario;

            R::store($tarefa);
        }



        header("Location: index.php");
        exit();
    }
}
