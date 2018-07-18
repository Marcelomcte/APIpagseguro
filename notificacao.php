<?php

$notificationCode = preg_replace('/[^[:alnum:]-]/','',$_POST["notificationCode"]);

$data['token'] ='BA4AC74C8A8943768AEFC68906FE4080';
$data['email'] = 'marcelo.carvalho@praxisjr.com.br';

$data = http_build_query($data);

$url = 'https://ws.sandbox.pagseguro.uol.com.br/v3/transactions/notifications/'.$notificationCode.'?'.$data;

$curl = curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_URL, $url);
$xml = curl_exec($curl);
curl_close($curl);

$xml = simplexml_load_string($xml);

$reference = $xml->reference;
$status = $xml->status;

if($reference && $status){
 include_once 'conecta.php';
 $conn = new conecta();

 $rs_pedido = $conn->consultarPedido($reference);

 if($rs_pedido){
 $conn->atualizaPedido($reference,$status);
 }
}

?>
