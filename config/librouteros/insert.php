<?php

// Define
$router   = '192.168.0.189';
$username = 'admin';
$password = '';

$id = "257605";

require_once '../mikrotik.class.php';

echo "<br><br>";


echo "<BR><BR>";

// Comando 

$command = '/log/print';
$args    = array('name'=> 'backup-mikrotik.backup');


// API

require_once 'RouterOS.php';

$mikrotik = new Lib_RouterOS();
$mikrotik->setDebug(false);

try {
    // Estabelecer conex�o com roteador; lan�a exce��o se a conex�o falha
    $mikrotik->connect($router);

    // Enviar seq��ncia de login; lan�a exce��o no inv�lido nome de usu�rio / senha
    $mikrotik->login($username, $password);

    // Codifica e envia comando para router; lan�a exce��o se a conex�o perdida
    $mikrotik->send($command, $args);

    
    // Resposta do MK
    $response = $mikrotik->read();

    // Exibi Resposta
    print_r($response);
    
    
    
    echo $first['.ret'];

} catch (Exception $ex) {
    echo "Debug: " . $ex->getMessage() . "\n";
}
