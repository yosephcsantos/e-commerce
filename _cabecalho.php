<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title><?php print $cabecalho_title; ?></title>

    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/mobile.css" media="(max-width: 939px)">

    <?php
      print @$cabecalho_css;
    ?>
  </head>
  <body>

    <header class="container">
      <h1><img src="img/logo.png" alt="Mirror Fashion"></h1>

      <p class="sacola">
        Nenhum item na sacola de compras
      </p>

      <nav class="menu-opcoes">
        <ul>
          <li><a href="index.php">Sua Conta</a></li>
          <li><a href="index.php">Lista de Desejos</a></li>
          <li><a href="index.php">Cartão Fidelidade</a></li>
          <li><a href="sobre.php">Sobre</a></li>
          <li><a href="index.php">Ajuda</a></li>
        </ul>
      </nav>
    </header><!-- fim do cabecalho -->