<?php
header("Content-Type: text/html; charset=ISO-8859-1", true);
include("../config/conexao.class.php");

$campo = $_GET['campo'];
$valor = $_GET['valor'];

$ok=''; // imagem de confirma��o
$erro='<font color=red>ERRO</font>'; // imagem de nega��o

// Verificando o campo codigo
if ($campo == "ip") {

    $sql = $mysqli->query("SELECT * FROM assinaturas WHERE ip = '$valor'");
    $job = mysqli_fetch_array($sql);


    if ($job['ip'] == $valor) {
        echo $erro;
        echo " Endere�o de IP j� Ultilzado por outro Usu�rio";
    } else {
        echo $ok;
    }

}
?>