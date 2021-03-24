<?php

include_once ("Conexao.php");

$conectaconta = new Conexao();
$conectaconta->conectar();

$stmtconta = $conectaconta->conectar()->prepare("SELECT * FROM usuarios");

$stmtconta->execute();

$contar_resultados = $stmtconta->rowCount();

//$consultaultimo = ($contar_resultados)+1;
//$ultimo = $consultaultimo;

$ultimo = $contar_resultados;




$data = date("d/m/Y");
$data .= " as ";
$data .= date("H:i");
$datafinal = $data;

$exemplo = date("d/m/Y") . " as " . date("H:i")

echo "<br><br>" . $datafinal;

?>