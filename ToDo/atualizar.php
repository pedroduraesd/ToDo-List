<?php
session_start();
require_once "../classes/rb.php";

if (isset($_GET['id'])) {
    R::setup('mysql:host=sql303.infinityfree.com;dbname=if0_43060982_predo', 'if0_43060982', '5lhcorPR5rxc3t');

    if (R::testConnection()) {
        $tarefa = R::load('tarefa', $_GET['id']);

        if ($tarefa->concluida == true) {
            $tarefa->concluida = false;
        } else {
            $tarefa->concluida = true;
        }



        R::store($tarefa);

        header("Location: index.php?filtro={$_GET['filtro']}");
        exit();
    }
}
