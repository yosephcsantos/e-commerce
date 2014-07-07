<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Checkout Mirror Fashion</title>
	<meta name="viewport" content="width=device-width">

	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- <link rel="stylesheet" href="css/bootstrap-flatly.css"> -->

	<style>
	/* exercicio frescura de design */
	.navbar {
		margin: 0;
	}

	body {
		padding-bottom: 50px;
	}

	.navbar .glyphicon {
		color: white;
	}

	#endereco-cobranca button {
		margin-left: 10px;
	}

	</style>
</head>
<body>

<?php 
	//$conexao = mysqli_connect("localhost", "root", "", "WD43");
	$conexao = mysqli_connect("localhost", "root", "", "WD43");
	$dados = mysqli_query($conexao, "SELECT * FROM produtos WHERE id = $_POST[id]");
	$produto = mysqli_fetch_array($dados);
?>

<header>
	<nav class="navbar navbar-inverse navbar-static-top">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.php">Mirror Fashion</a>

			<button class="navbar-toggle" data-target=".navbar-collapse" data-toggle="collapse" type="button">
				<span class="glyphicon glyphicon-align-justify"></span>
			</button>
		</div>
		<ul class="nav navbar-nav collapse navbar-collapse">
    		<li><a href="sobre.php"><span class="glyphicon glyphicon-home"></span> Sobre</a></li>
    		<li><a><span class="glyphicon glyphicon-question-sign"></span> Ajuda</a></li>
    		<li><a data-toggle="modal" href="#faq"><span class="glyphicon glyphicon-list-alt"></span> Perguntas frequentes</a></li>
    		<li><a href="#"><span class="glyphicon glyphicon-bullhorn"></span> Entre em contato</a></li>
        </ul>
    </nav>

	<div class="jumbotron">
		<div class="container">
			<h1>Ótima escolha!</h1>
			<p>Obrigado por comprar na Mirror Fashion! Preencha seus dados para efetivar a compra.</p>
		</div>
	</div>

</header>

<div class="container">
	<div class="row">
		<div class="col-md-3 col-sm-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2 class="panel-title">Sua compra</h2>
				</div>
				<div class="panel-body">
					<img src="img/produtos/foto<?= $produto["id"] ?>-<?= $_POST["cor"] ?>.png" 
						 alt="<?= $produto["nome"] ?>" 
						 class="img-thumbnail img-responsive hidden-xs">

					<dl>
						<dt>Produto</dt>
						<dd><?= $produto["nome"] ?></dd>

						<dt>Cor</dt>
						<dd><?= $_POST["cor"] ?></dd>

						<dt>Tamanho</dt>
						<dd><?= $_POST["tamanho"] ?></dd>

						<dt>Preço</dt>
						<dd><?= $produto["preco"] ?></dd>
					</dl>

					<a class="btn btn-default" href="produto.php?id=<?= $produto["id"] ?>">Alterar pedido</a>
				</div>
			</div>
		</div>

		<div class="col-md-9 col-sm-8">
			<form action="efetivar.php" method="POST">
				<input type="hidden" name="produto" value="<?= $produto["nome"] ?> - <?= $_POST["cor"] ?> - <?= $_POST["tamanho"] ?>">

				<div class="row">
					<fieldset class="col-md-6">
						<legend>Dados pessoais</legend>

						<div class="form-group">
							<label for="nome">Nome completo</label>
							<input type="text" class="form-control" id="nome" name="nome" required>
						</div>

						<div class="form-group">
							<label for="email">Email</label>

							<div class="input-group">
  								<span class="input-group-addon">@</span>
  								<input type="email" class="form-control" id="email" placeholder="email@exemplo.com" name="email">	
							</div>
						</div>

						<div class="form-group">
							<label for="cpf">CPF</label>
							<input type="text" class="form-control" id="cpf" placeholder="999.999.999-99" name="cpf" data-mask="999.999.999-99">
						</div>

						<div class="checkbox">
							<label>
								<input type="checkbox" value="true" name="spam">
								Quero receber spam da Mirror Fashion
							</label>
						</div>
					</fieldset>

					<fieldset class="col-md-6">
						<legend>Cartão de crédito</legend>

						<div class="form-group">
							<label for="numero-cartao">Número - CVV</label>
							<input type="text" class="form-control" id="numero-cartao" placeholder="9999 9999 9999 9999 - 999" name="numero-cartao" data-mask="9999 9999 9999 9999 - 999">
						</div>

						<div class="form-group">
							<label for="validade-cartao">Validade</label>
							<input type="month" class="form-control" id="validade-cartao" name="validade-cartao">
						</div>
					</fieldset>
				</div>

				<div class="row">
					<fieldset class="col-md-6">
						<legend>Endereço entrega</legend>

						<div class="form-group">
							<label for="rua-entrega">Rua, número e complemento</label>
							<input type="text" class="form-control" id="rua-entrega" name="rua-entrega">
						</div>

						<div class="form-group">
							<label for="cep-entrega">CEP</label>
							<input type="text" class="form-control" id="cep-entrega" placeholder="00000-000" name="cep-entrega" data-mask="99999-999">
						</div>

						<div class="form-group">
							<label for="cidade-entrega">Cidade</label>
							<input type="text" class="form-control" id="cidade-entrega" name="cidade-entrega">
						</div>

						<div class="form-group">
							<label for="estado-entrega">Estado</label>
							<select name="estado-entrega" id="estado-entrega" class="form-control">
								<option value="SP">São Paulo</option>
								<option value="RJ">Rio de Janeiro</option>
							</select>
						</div>
					</fieldset>

					<fieldset class="col-md-6" id="endereco-cobranca">
						<legend>Endereço cobrança</legend>

						<div class="form-group">
							<label for="rua-cobranca">Rua, número e complemento</label>
							<input type="text" class="form-control" id="rua-cobranca" name="rua-cobranca">
						</div>

						<div class="form-group">
							<label for="cep-cobranca">CEP</label>
							<input type="text" class="form-control" id="cep-cobranca" placeholder="00000-000" name="cep-cobranca" data-mask="99999-999">
						</div>

						<div class="form-group">
							<label for="cidade-cobranca">Cidade</label>
							<input type="text" class="form-control" id="cidade-cobranca" name="cidade-cobranca">
						</div>

						<div class="form-group">
							<label for="estado-cobranca">Estado</label>
							<select name="estado-cobranca" id="estado-cobranca" class="form-control">
								<option value="SP">São Paulo</option>
								<option value="RJ">Rio de Janeiro</option>
							</select>
						</div>
					</fieldset>
				</div>

				<button type="submit" class="btn btn-primary btn-lg pull-right">
					<span class="glyphicon glyphicon-thumbs-up"></span>
					Confirmar Pedido
				</button>
			</form>
		</div>
	</div>
</div>

	

<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap-inputmask.js"></script>

<script>
	$('<button class="btn btn-default btn-xs" type="button">Mesmo endereço</button>')
		// extra: <span class="glyphicon glyphicon-refresh"/>
		.on('click', function(){

			// EXERCICIO NORMAL
			//$('#rua-cobranca').val($('#rua-entrega').val());
			//$('#cep-cobranca').val($('#cep-entrega').val());
			//$('#cidade-cobranca').val($('#cidade-entrega').val());
			//$('#estado-cobranca').val($('#estado-entrega').val());


			// OPCIONAL for flexivel
			//$('#endereco-cobranca .form-control').val(function(){
			//  var original = $('#' + this.name.replace('cobranca', 'entrega'));
			//	return original.val();
			//});


			// OPCIONAL AVANCADO: binding
			$('#endereco-cobranca .form-control').each(function(){
				var original = $('#' + this.name.replace('cobranca', 'entrega'));
				var copiado  = $(this);

				// executa 1a vez
				copiado.val(original.val());

				// seta evento futuro
				original.on('change input', function() {
					copiado.val(original.val());
				});
			});
			$('#endereco-cobranca').attr('disabled', 'disabled');
		})

		.appendTo('#endereco-cobranca legend');
</script>


<!-- FAQ -->
<div class="modal fade" id="faq">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- cabecalho -->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h3 class="modal-title">Perguntas frequentes</h3>
			</div>

			<!-- conteudo -->
			<div class="modal-body">
				<h4>Posso pagar com boleto?</h4>
				<p>Nope.</p>

				<h4>Qual o prazo de entrega?</h4>
				<p>28 min ou seu dinheiro de volta.</p>

				<h4>Porque só posso comprar 1 produto por vez?</h4>
				<p>Foco, meu caro, foco.</p>
			</div>

		</div>
	</div>
</div>


</body>
</html>
