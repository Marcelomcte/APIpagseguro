<?php

	$pedido = preg_replace('/[^[:alnum:]-]/','',$_POST["idPedido"]);

	$data['token'] ='BA4AC74C8A8943768AEFC68906FE4080';
	$data['email'] = 'marcelo.carvalho@praxisjr.com.br';
	$data['currency'] = 'BRL';
	$data['itemId1'] = '1';
	$data['itemQuantity1'] = '1';
	$data['itemDescription1'] = 'Pedido de teste'.$pedido;
	$data['itemAmount1'] = '100.00';
	$data['reference'] = $pedido;

	$data = http_build_query($data);

	$url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/checkout';

	$curl = curl_init();
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
	$xml = curl_exec($curl);
	curl_close($curl);

	$xml = simplexml_load_string($xml);
	echo $xml -> code;

?>
