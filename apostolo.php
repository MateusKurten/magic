<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Página do Apóstolo</title>
	<link rel="stylesheet" type="text/css" href="estilo.css" />
</head>
<body>
<?php
	require 'config.php';
	require 'connection.php';
	require 'database.php';


?>

<header class="home">
<h1> Bem vindo, Apóstolo </h1>
</header>
<br><br>
<div class="container2">
<fieldset><legend><h2>Resumo</h2></legend>
<table class="tabhome">
<tr>
<td class="celularesumotitulo">Minhas cartas emprestadas</td>
<td class="celularesumotitulo">Minhas dívidas</td>
</tr>
<tr>
<td class="celularesumo">
<textarea class="resumo" id="listacartasemprestadas" readonly rows="12">
<?php
	$arrayResumo = DBReadQuery("select c.nome, a.Nome from Carta c, Emprestimo e, Amigo a
										where e.idDono = 3
										and c.idCarta = e.idCarta
										and e.idDevedor = a.idAmigo;");


	for ($i = 0; $i < count($arrayResumo); $i++){
		echo $arrayResumo[$i]["nome"] . " ---> " . $arrayResumo[$i]["Nome"] . "\n";
	}
?>

</textarea></td>
<td class="celularesumo">
<textarea class="resumo" id="listacartasdosoutros" readonly rows="12">
<?php 
	$arrayResumo2 = DBReadQuery("select a.nome, c.Nome from Carta c, Emprestimo e, Amigo a
	where e.idDevedor = 3
	and c.idCarta = e.idCarta
	and e.idDono = a.idAmigo;");


	for ($i = 0; $i < count($arrayResumo2); $i++){
	echo $arrayResumo2[$i]["Nome"] . " ---> " . $arrayResumo2[$i]["nome"] . "\n";
}
?>
</textarea></td>
</table>
</fieldset>
<fieldset><legend><h2>Cadastrar carta</h2></legend>
<form method="post" action="cadastroCarta.php">
Nome da carta:
<input type="text" id="nomeCartaCadastro" name="nomeCarta">
&nbsp;&nbsp;&nbsp;&nbsp;
Coleção:
<select id="colecaoCartaCadastro" name="nomeColecao">
<?php
	$arrayColecao = DBRead("Nome", "Colecao");
	for ($i = 0; $i < count($arrayColecao); $i++){
		echo ("<option>".$arrayColecao[$i]["Nome"]."</option>");
	}
?>
</select>
&nbsp;&nbsp;&nbsp;&nbsp;
<INPUT TYPE="hidden" NAME="idAmigo" VALUE=3>
<input type="submit" name="cadastro" value="Cadastrar">
</form>
</fieldset>
<fieldset><legend><h2>Cadastrar Empréstimo</h2></legend>
<form method="post" action="cadastroEmprestimo.php">
Nome da carta:
<select id="nomeCartaEmprestimo" name="nomeCarta">
<?php
	$arrayCarta = DBReadQuery("select c.Nome from Carta c, AmigoCarta ac where ac.idAmigo = 3 and ac.idCarta = c.idCarta;");
	for ($i = 0; $i < count($arrayCarta); $i++){
		echo ("<option>".$arrayCarta[$i]["Nome"]."</option>");
	}
?>
</select>
&nbsp;&nbsp;&nbsp;&nbsp;
Nome do Amigo:
<select id="amigoEmprestimoCadastro" name="nomeAmigo">
<?php
	$arrayAmigo = DBRead("Nome", "Amigo", "where idAmigo != 3");
	for ($i = 0; $i < count($arrayAmigo); $i++){
		echo ("<option>".$arrayAmigo[$i]["Nome"]."</option>");
	}
?>
</select>
&nbsp;&nbsp;&nbsp;&nbsp;
<input type="hidden" name="idAmigo" value = 3>
<input type="submit" name="cadastro" value="Cadastrar">
</form>
</fieldset>
<fieldset><legend><h2>Deletar Empréstimo</h2></legend>
<form method="post" action="apagarEmprestimo.php">
Nome da carta:
<select id="nomeCartaEmprestimo" name="nomeCarta">
<?php
	$arrayCarta = DBReadQuery("select c.Nome from Carta c, Emprestimo e where e.idDono = 3 and e.idCarta = c.idCarta;");
	for ($i = 0; $i < count($arrayCarta); $i++){
		echo ("<option>".$arrayCarta[$i]["Nome"]."</option>");
	}
?>
</select>
&nbsp;&nbsp;&nbsp;&nbsp;
Nome do Amigo:
<select id="amigoEmprestimoCadastro" name="nomeAmigo">
<?php
	$arrayAmigo = DBReadQuery("select distinct a.Nome from Amigo a, Emprestimo e where e.idDono = 3 and e.idDevedor = a.idAmigo;");
	for ($i = 0; $i < count($arrayAmigo); $i++){
		echo ("<option>".$arrayAmigo[$i]["Nome"]."</option>");
	}
?>
</select>
&nbsp;&nbsp;&nbsp;&nbsp;
<input type="hidden" name="idAmigo" value = 3>
<input type="submit" value="Deletar">
</form>
</fieldset>
<br>
<div class="botaoretorna">
<input type="button" value="Retornar para a Página Principal" onclick="location. href='index.html'">
</div>
</div>
</body>
</html>