<?php

// Define
$router   = '192.168.43.180:8728';
$username = 'admin';
$password = '';

// Comando
$command = '/system/resource/print';
$args    = array('.proplist' => 'version,cpu,cpu-frequency,cpu-load,uptime');

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
    
    $first = $response['0'];
    
    echo $first['version'];

} catch (Exception $ex) {
    echo "Debug: " . $ex->getMessage() . "\n";
}
