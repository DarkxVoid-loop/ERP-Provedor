<?php
header("Content-Type: text/html; charset=ISO-8859-1", true);

    require_once 'config/conexao.class.php';
    require_once 'config/crud.class.php';
    require_once 'config/mikrotik.class.php';
    $con = new conexao(); // instancia classe de conxao
    $con->connect(); // abre conexao com o banco
    
    $codigo = base64_decode($_GET['id']); 
    $imp = $mysqli->query("SELECT * FROM ordemservicos WHERE codigo = + $codigo");
    $csos = mysqli_fetch_array($imp);
    
    $idcliente = $csos['cliente'];
    $cli = $mysqli->query("SELECT * FROM clientes WHERE id = '$idcliente'");
    $cliente = mysqli_fetch_array($cli);
    
    $idtecnico = $csos['tecnico'];
    $tec = $mysqli->query("SELECT * FROM tecnicos WHERE id = '$idtecnico'");
    $tecnico = mysqli_fetch_array($tec);
    
    $idplano = $csos['plano'];
    $pla = $mysqli->query("SELECT * FROM planos WHERE id = '$idplano'");
    $plano = mysqli_fetch_array($pla);
    
    $idass = $csos['assinatura'];
    $assn = $mysqli->query("SELECT * FROM assinaturas WHERE id = '$idass'");
    $assinatura = mysqli_fetch_array($assn);
    
    $emp = $mysqli->query("SELECT * FROM empresa WHERE id = '1'");
    $empresa = mysqli_fetch_array($emp);
    $empresa['foto'];
    
?>
<html>
<title>IMPRESS�O ORDEM DE SERVI�OS</title>

<style>
.equipamentos {
 font-family:verdana;
 font-size:12px;
}
.fones {
 font-family:verdana;
 font-size:12px;
}
.titulos {
 font-family:verdana;
 font-size:22px;
 font-weight:600;
 padding:0px;
}
.os {
 font-family:verdana;
 font-size:18px;
}
.horario {
 font-family:verdana;
 font-size:18px;
}
.cliente {
 font-family:verdana;
 font-size:12px;
}
.problemas {
 font-family:verdana;
 font-size:12px;
}
</style>
<center>
<table width="860"><tr><td>
<img src="assets/images/<?php echo $empresa['foto'];?>" style="width:176px;height:60px;"><br>
<table width="100%">
<tr>
<td class="img">
</td>
<td>
<span class="titulos">
ORDEM DE SERVI�O - <?php if ($csos['situacao'] == 'O') { ?> PEDIDO DE OR�AMENTO <?php } ?>
		      <?php if ($csos['situacao'] == 'I') { ?> PEDIDO DE INSTALA��O <?php } ?>
              <?php if ($csos['situacao'] == 'NI') { ?> NOVA INSTALA��O <?php } ?>
		      <?php if ($csos['situacao'] == 'M') { ?> PEDIDO DE MANUTEN��O <?php } ?>
		      <?php if ($csos['situacao'] == 'R') { ?> PEDIDO DE RECUPERA��O <?php } ?>
		      <?php if ($csos['situacao'] == 'A') { ?> PEDIDO APROVADO <?php } ?>
              <?php if ($csos['situacao'] == 'CS') { ?> SOLICITA��O DE CANCELAMENTO <?php } ?>
		      <?php if ($csos['situacao'] == 'C') { ?> PEDIDO CANCELADO <?php } ?> </span><br><br>
<span style="font-family:verdana;font-size:12px;">
<?php echo $empresa['empresa']; ?> <?php echo $empresa['cnpj']; ?><br>
<?php echo $empresa['endereco']; ?>, <?php echo $empresa['cidade']; ?>, <?php echo $empresa['estado']; ?> - <?php echo $empresa['cep']; ?><br>
<?php echo $empresa['site']; ?>

</td>
<td class="fones"><br>
<?php echo $empresa['tel1']; ?><br>
<?php echo $empresa['tel2']; ?><br>
</td>
</tr>

<tr>
<td></td>
<td class="os">
ORDEM DE SERVI�O N� <?php echo $csos['codigo']; ?>
</td>
<td class="horario">
<?php echo $csos['emissao']; ?>
</td>
</tr>
</table>
<hr size="3" color="#000">
<table width="100%">
<tr>
<td>

<?php if ($csos['situacao'] == 'I') { ?>
<table width="100%">
<tr class="cliente">
<td> <b>Cliente:</b> <?php echo $cliente['nome']; ?> </td>
<td> <b>CPF/CNPJ:</b> <?php echo $cliente['cpf']; ?> </td>
<td> <b>Telefone:</b> <?php echo $cliente['tel']; ?> </td>
</tr>
<tr class="cliente">
<td> <b>Endere�o:</b> <?php echo $assinatura['endereco']; ?>, <?php echo $assinatura['numero']; ?> - <?php echo $assinatura['bairro']; ?> </td>
<td> <b>Cidade:</b> <?php echo $assinatura['cidade']; ?> </td>
<td> <b>UF/CEP:</b> <?php echo $assinatura['estado']; ?> / <?php echo $assinatura['cep']; ?></td>
</tr>
</table>
<?php } else { ?>
<table width="100%">
<tr class="cliente">
<td> <b>Cliente:</b> <?php echo $cliente['nome']; ?> </td>
<td> <b>CPF/CNPJ:</b> <?php echo $cliente['cpf']; ?> </td>
<td> <b>Telefone:</b> <?php echo $cliente['tel']; ?> </td>
</tr>
<tr class="cliente">
<td> <b>Endere�o:</b> <?php echo $cliente['endereco']; ?>, <?php echo $cliente['numero']; ?> - <?php echo $cliente['bairro']; ?> </td>
<td> <b>Cidade:</b> <?php echo $cliente['cidade']; ?> </td>
<td> <b>UF/CEP:</b> <?php echo $cliente['estado']; ?> / <?php echo $cliente['cep']; ?></td>
</tr>
</table>

<?php } ?>
</td></tr>
</table>
<hr size="3" color="#000">
<table width="100%">
<tr>
<td class="problemas">
<b>Problema:</b><br>
<?php echo $csos['servico']; ?> 

<?php if ($csos['situacao'] == 'I') { ?> PEDIDO DE INSTALA��O <?php }  { ?> -
PLANO: <?php echo $plano['nome']; ?> | R$ <?php echo number_format($plano['preco'],2,',','.'); ?> | 
    <?php
    $idservc = $plano['servidor'];
    $serv = $mysqli->query("SELECT * FROM servidores WHERE id = '$idservc'");
    $servidor = mysqli_fetch_array($serv);
    ?>
    TORRE: <?php echo $servidor['servidor']; ?>
<?php } ?>
<?php if ($csos['situacao'] == 'O') { ?>
-  VALOR DO SERVI�O R$ <?php echo number_format($csos['preco'],2,',','.'); ?> | ATENDENTE: <?php echo $csos['atendente']; ?>
<?php } ?>
<?php if ($csos['situacao'] == 'M') { ?>
-  VALOR DO SERVI�O R$ <?php echo number_format($csos['preco'],2,',','.'); ?> | ATENDENTE: <?php echo $csos['atendente']; ?>
<?php } ?>

<hr size="1" style="padding:5px;" color="#dddeee">
<b>Diagnostico:</b><br>
<?php echo $csos['diagnostico']; ?>

<hr size="1" style="padding:5px;" color="#dddeee">
<b>Solu��o:</b><br>
<?php echo $csos['solucao']; ?>
<hr size="1" color="#dddeee">


</td></tr>
</table>
<hr size="3" color="#000">
<table width="100%" cellspacing="0">
<tr class="equipamentos" bgcolor="#333333" height="30">
 <td style="color:#ffffff;">Refer�ncia</td>
 <td style="color:#ffffff;">Equipamento</td>
 <td style="color:#ffffff;">Qtd</td>
 <td style="color:#ffffff;">Observa��es</td>
</tr>
<?php
$idass = $csos['codigo'];
$consultas = $mysqli->query("SELECT * FROM instalacao_equipamentos WHERE assinatura = '$idass'");
while($campo = mysqli_fetch_array($consultas)){
$ideqp = $campo['equipamento'];
$prode = $mysqli->query("SELECT * FROM equipamentos WHERE id = '$ideqp'");
$equipamentos = mysqli_fetch_array($prode);
?>
<tr class="equipamentos" bgcolor="<?php if ($BRB_rowcounter++%2==0){?>#ffffff<?php }else{ ?>#eeeeee<?php }?>">
 <td><?php echo $equipamentos['barcode']; ?></td>
 <td><?php echo $equipamentos['equipamento']; ?></td>
 <td><?php echo $campo['qtd']; ?></td>
 <td><?php echo $campo['obs']; ?></td>
</tr>
<?php } ?>
</table>
<hr size="3" color="#000">
<table width="100%">
<tr>
<td class="tecnico">

<table width="100%">
<tr class="cliente">
<td> <b>T�cnico:</b> <?php echo $tecnico['nome']; ?></td>
<td> <b>CPF/CNPJ:</b> <?php echo $tecnico['cpf']; ?></td>
<td> <b>Telefone:</b> <?php echo $tecnico['tel']; ?></td>
</tr>
<tr class="cliente">
<td> <b>Endere�o:</b> <?php echo $tecnico['endereco']; ?></td>
<td> <b>Cidade:</b> <?php echo $tecnico['cidade']; ?></td>
<td> <b>UF/CEP:</b> <?php echo $tecnico['estado']; ?> / <?php echo $tecnico['cep']; ?></td>
</tr>
</table>


</td></tr>
</table>
<hr size="3" color="#000">
<table width="100%">
<tr>
 <td class="rodape">
<table width="100%">
<tr>
 <td width="400">
 <span style="font-size:11px;font-family:verdana;">CLIENTE:<br><br><br><br><br>
 
 _______________________________________________<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Assinatura | <?php echo $cliente['nome']; ?>

 </td>
 <td width="400">
<span style="font-size:11px;font-family:verdana;">T�CNICO:<br><br><br><br><br>
 
 _______________________________________________<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Assinatura | <?php echo $tecnico['nome']; ?>

 </td>
 </tr>
</table> 


</td></tr>
</table>
<hr size="3" color="#000">
<span style="font-size:11px;font-family:verdana;">VIA CLIENTE</span><br>
----------------------------------------------------------------------------------------------------------------------------------------------
<br>
<img src="assets/images/<?php echo $empresa['foto'];?>" style="width:176px;height:60px;"><br>
<table width="100%">
<tr>
<td class="img">
</td>
<td>
<span class="titulos">
TIPO DE OS - <?php if ($csos['situacao'] == 'O') { ?> PEDIDO DE OR�AMENTO <?php } ?>
		      <?php if ($csos['situacao'] == 'I') { ?> PEDIDO DE INSTALA��O <?php } ?>
               <?php if ($csos['situacao'] == 'NI') { ?> NOVA INSTALA��O <?php } ?>
		      <?php if ($csos['situacao'] == 'M') { ?> PEDIDO DE MANUTEN��O <?php } ?>
		      <?php if ($csos['situacao'] == 'R') { ?> PEDIDO DE RECUPERA��O <?php } ?>
		      <?php if ($csos['situacao'] == 'A') { ?> PEDIDO APROVADO <?php } ?>
		      <?php if ($csos['situacao'] == 'C') { ?> PEDIDO CANCELADO <?php } ?> </span><br><br>
<span style="font-family:verdana;font-size:12px;">
<?php echo $empresa['empresa']; ?> <?php echo $empresa['cnpj']; ?><br>
<?php echo $empresa['endereco']; ?>, <?php echo $empresa['cidade']; ?>, <?php echo $empresa['estado']; ?> - <?php echo $empresa['cep']; ?><br>
<?php echo $empresa['site']; ?>

</td>
<td class="fones"><br>
<?php echo $empresa['tel1']; ?><br>
<?php echo $empresa['tel2']; ?><br>
</td>
</tr>

<tr>
<td></td>
<td class="os">
ORDEM DE SERVI�O N� <?php echo $csos['codigo']; ?>
</td>
<td class="horario">
<?php echo $csos['emissao']; ?>
</td>
</tr>
</table>
<?php if ($csos['situacao'] == 'O') { ?>
<table width="100%"><tr>
<td class="cliente">
<?php echo $csos['servico']; ?> -  VALOR DO SERVI�O R$ <?php echo number_format($csos['preco'],2,',','.'); ?> | ATENDENTE: <?php echo $csos['atendente']; ?>
</td></tr></table>
<?php } ?>

<?php if ($csos['situacao'] == 'M') { ?>
<table width="100%"><tr>
<td class="cliente">
<?php echo $csos['servico']; ?> -  VALOR DO SERVI�O R$ <?php echo number_format($csos['preco'],2,',','.'); ?> | ATENDENTE: <?php echo $csos['atendente']; ?>
</td></tr></table>
<?php } ?>
<hr size="3" color="#000">

<br><br>
</td></tr></table>



</center>