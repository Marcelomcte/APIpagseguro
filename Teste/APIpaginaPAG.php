<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Teste API Pagseguro</title>
   	<link rel="stylesheet" type="text/css" href="style.css">
   	<script type="text/javascript" src="jquery.js"></script>

</head>

<body>

	<div class="caixa">
		<h1>PagSeguro</h1>
		<h3>Valor da compra: R$ 100,00</h3>
		<button onclick="enviaPagamento()">COMPRAR</button>
	</div>

	<script>

	function enviaPagamento(){
	$.post("pagseguro.php", '', function($data){
	
		window.location.href = 'https://pagseguro.uol.com.br/v2/checkout/payment.html?code='+data;

	})
	}
	</script>		
</body>	
</html>