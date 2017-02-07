<?php
//Desenvolvido por Luciano Zanita :: http://whmcs.red

//Laravel DataBase
use WHMCS\Database\Capsule;

//Bloqueia o acesso direto ao arquivo
if (!defined("WHMCS")){
	die("Acesso restrito!");
}

//Função do Módulo
function aniversario_red($vars){
	//ID do Campo de data de Nascimento
	$camponascimento = "ID do Campo";
	//Titulo do E-mail (nome da mensagem)
	$mensagem = "nome unico";
	//usuário do administrador
	$admin = "usuario";

	//////////////////////////////////////////////////////
	////////////NÃO MODIFICAR A PARTIR DAQUI//////////////
	//////////////////////////////////////////////////////

	//Conexão via PDO & trazendo informações do nascimento
	$pdo = Capsule::connection()->getPdo();
	$pdo->beginTransaction();
	$clientes = $pdo->prepare("SELECT `a`.`id`, `b`.`value` as `nascimento` FROM `tblclients` as `a` JOIN `tblcustomfieldsvalues` as `b` ON `b`.`relid` = `a`.`id` WHERE `b`.`fieldid` = :nascimentoid");
	$clientes->execute([':nascimentoid' => $camponascimento,]);
	$pdo->commit();

	//Pegar a data atual
	$dia = date('d');
	$mes = date('m');
	$ano = date('Y');

	//Configurações e Envio dos e-mail
	foreach($clientes AS $identificacao){
		//usuario do administrador
		$administrador = $admin;
		//ID do Cliente
		$valores["id"] = $identificacao['id'];
		//Email a ser enviado (nome dele)
		$valores["messagename"] = $mensagem;
		//Comando a ser executado na função
		$comando = "sendemail";
		//exemplificar a data
		$exemplificar = explode("/", $identificacao[nascimento]);
		//Verifica se o dia/mes são iguais para enviar a função
		if($exemplificar[0]==$dia AND $exemplificar[1]==$mes){
	 		//Executa a função via localAPI
	    	$executar = localAPI($comando, $valores, $administrador);
	    }
	}
}

//Adicionar Função ao CronJob do WHMCS
add_hook("DailyCronJob",1,"aniversario_red");

?>