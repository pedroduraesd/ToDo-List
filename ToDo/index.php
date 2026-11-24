<?php
session_start();

if (!isset($_SESSION['logado']) || $_SESSION['logado'] != true) {
    header('Location: login.php');
    exit();
}

$filtro = $_GET['filtro'] ?? 'todas';
$errovazio = $_GET['errovazio'] ?? 0;

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de tarefas</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <?php echo "<h2>Bem vindo {$_SESSION['nome']}</h2>" ?>

    <a href="logout.php"><button>Sair</button></a>

    <div>
        <form action="inclusao.php" method="get">
            <fieldset>
                <input type="text" name="tarefa" id="tarefa" placeholder="Digite uma tarefa..." autofocus>
                <button type="submit">Adicionar</button>

                <?php
                if ($errovazio) {
                    echo "<p>Preencha esse campo</p>";
                }
                ?>
            </fieldset>
        </form>
    </div>
    <form action="index.php" method="get">
        <fieldset>
            <button type="submit" name="filtro" value="todas" class="<?= $filtro == 'todas' ? 'ativo' : '' ?>">Todas</button>
            <button type="submit" name="filtro" value="concluidas" class="<?= $filtro == 'concluidas' ? 'ativo' : '' ?>">Concluídas</button>
            <button type="submit" name="filtro" value="naoconcluidas" class="<?= $filtro == 'naoconcluidas' ? 'ativo' : '' ?>">Não Concluídas</button>
        </fieldset>
    </form>
    <div>
        <ul>
            <?php
            require_once 'classes/rb.php';
            R::setup('mysql:host=sql303.infinityfree.com;dbname=if0_43060982_predo', 'if0_43060982', '5lhcorPR5rxc3t');

            $usuarioId = $_SESSION['id'];

            if ($filtro == 'todas') {
                $tarefas = R::find('tarefa', 'usuario_id = ?', [$usuarioId]);
            } else if ($filtro == 'concluidas') {
                $tarefas = R::find('tarefa', 'usuario_id = ? AND concluida = 1', [$usuarioId]);
            } else {
                $tarefas = R::find('tarefa', 'usuario_id = ? AND concluida = 0', [$usuarioId]);
            }
            foreach ($tarefas as $tarefa) {
                if ($tarefa->concluida == true) {
                    echo "<li class=\"concluida\"><a href=\"atualizar.php?id={$tarefa->id}&filtro={$filtro}\"><button type=\"button\">✓</button></a>{$tarefa->descricao} <a href=\"exclusao.php?id={$tarefa->id}&filtro={$filtro}\"><button type=\"button\">X</button></a></li>";
                } else {
                    echo "<li><a href=\"atualizar.php?id={$tarefa->id}&filtro={$filtro}\"><button type=\"button\">✓</button></a>{$tarefa->descricao} <a href=\"exclusao.php?id={$tarefa->id}&filtro={$filtro}\"><button type=\"button\">X</button></a></li>";
                }
            }
            ?>
        </ul>
    </div>
</body>

</html>
