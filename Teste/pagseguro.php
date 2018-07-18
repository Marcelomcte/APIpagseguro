<?php

	$data['token'] ='BA4AC74C8A8943768AEFC68906FE4080';
	$data['email'] = 'marcelo.carvalho@praxisjr.com.br';
	$data['currency'] = 'BRL';
	$data['itemId1'] = '1';
	$data['itemQuantity1'] = '1';
	$data['itemDescription1'] = 'Produto de Teste';
	$data['itemAmount1'] = '100.00';

	$url = 'https://ws.pagseguro.uol.com.br/v2/checkout';

	$data = http_build_query($data);

	$curl = curl_init($url);

	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
	curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
	$xml= curl_exec($curl);

	curl_close($curl);

	$xml= simplexml_load_string($xml);
	echo $xml -> code;

?>