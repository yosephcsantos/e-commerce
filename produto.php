<?php 
	// busca dados do produto
	//$conexao = mysqli_connect("localhost", "root", "", "WD43");
	$conexao = mysqli_connect("localhost", "root", "", "WD43");
	$dados = mysqli_query($conexao, "SELECT * FROM produtos WHERE id = $_GET[id]");
	$produto = mysqli_fetch_array($dados);

	// inclui cabeçalho
	$cabecalho_title = "$produto[nome] - Mirror Fashion";
	$cabecalho_css = '<link rel="stylesheet" href="css/produto.css">';
	include("_cabecalho.php"); 
?>

<div class="produto-back">
	<div class="container">
		<div class="produto">
			<h1><?= $produto["nome"] ?></h1>
			<h2>por apenas <?= $produto["preco"] ?></h2>

			<form action="checkout.php" method="POST">
				<input type="hidden" name="id" value="<?= $produto["id"] ?>">
				<input type="hidden" name="nome" value="<?= $produto["nome"] ?>">

				<fieldset class="cores">
					<legend>Escolha a cor:</legend>

					<input type="radio" name="cor" value="verde" id="verde" checked>
					<label for="verde">
						<img src="img/produtos/foto<?= $produto["id"] ?>-verde.png" alt="Cardigã Verde com detalhes em azul">
					</label>
					
					<input type="radio" name="cor" value="rosa" id="rosa">
					<label for="rosa">
						<img src="img/produtos/foto<?= $produto["id"] ?>-rosa.png" alt="Cardigã Rosa com detalhes em laranja">
					</label>
					
					<input type="radio" name="cor" value="azul" id="azul">
					<label for="azul">
						<img src="img/produtos/foto<?= $produto["id"] ?>-azul.png" alt="Cardigã Roxo com detalhes em Roxo escuro">
					</label>
						
				</fieldset>

				<fieldset class="tamanhos">
					<legend>Escolha o tamanho:</legend>

					<input type="range" min="36" max="46" value="42" step="2" name="tamanho" id="tamanho">
					<output for="tamanho" name="valortamanho">42</output>
				</fieldset>

				<input type="submit" class="comprar" value="Comprar">
			</form>
		</div>

		<div class="detalhes">
			<h2>Detalhes do produto</h2>

			<p><?= $produto["descricao"] ?></p>

			<table>
				<thead>
					<tr>
						<th>Característica</th>
						<th>Detalhe</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Modelo</td>
						<td>Cardigã 7845</td>
					</tr>
					<tr>
						<td>Material</td>
						<td>Algodão e poliester</td>
					</tr>
					<tr>
						<td>Cores</td>
						<td>Azul, Rosa e Verde</td>
					</tr>
					<tr>
						<td>Lavagem</td>
						<td>Lavar a mão</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

<script src="js/jquery.js"></script>
<script>
$('[name=tamanho]').on('input', function(){
	$('[name=valortamanho]').text(this.value);
});
</script>

<?php include("_rodape.php"); ?>