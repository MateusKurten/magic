<?php

    require 'config.php';
    require 'connection.php';
    require 'database.php';

    $nomeCarta = $_POST['nomeCarta'];
    $arrayCarta = DBReadQuery("select idCarta from Carta where Nome = '{$nomeCarta}'");
    $arrayDevedor = DBReadQuery("select idAmigo from Amigo where Nome = '{$_POST['nomeAmigo']}'");

    $result1  = DBExecute("Insert into Emprestimo(idCarta, idDono, idDevedor) values ({$arrayCarta[0]['idCarta']},{$_POST['idAmigo']}, {$arrayDevedor[0]['idAmigo']})");

    
    
    if ($result1){
        echo "Cadastro feito com sucesso!";
    } else {
        echo "Erro!";
    }

    switch ($_POST['idAmigo']){
        case 1: echo '<br><input type="button" value="Voltar" onclick="location. href=\'kurten.php\'">'; break;
        case 2: echo '<br><input type="button" value="Voltar" onclick="location. href=\'street.php\'">'; break;
        case 3: echo '<br><input type="button" value="Voltar" onclick="location. href=\'apostolo.php\'">'; break;
        case 4: echo '<br><input type="button" value="Voltar" onclick="location. href=\'ewerton.php\'">'; break;
        default: echo '<br><input type="button" value="Voltar" onclick="location. href=\'index.html\'">'; break;
    }
?>