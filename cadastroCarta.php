
<?php

    require 'config.php';
    require 'connection.php';
    require 'database.php';

    $result1  = DBExecute("Insert into Carta(Nome,Colecao) values ('{$_POST['nomeCarta']}','{$_POST['nomeColecao']}')");

    $arrayIdCarta = DBRead("idCarta", "Carta", "WHERE Nome = '{$_POST['nomeCarta']}'");


    $result2 = DBExecute("Insert into AmigoCarta(idAmigo,idCarta) values ({$_POST['idAmigo']},{$arrayIdCarta[0]['idCarta']})");
    
    
    if ($result1 AND $result2){
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