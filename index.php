<?php 
  $cabecalho_title = "Mirror Fashion";
  include("_cabecalho.php"); 
?>

<section class="container destaque">
  <section class="busca">
    <h2>Busca</h2>
    <form action="http://www.google.com.br/search" id="form-busca">
      <input type="search" name="q" id="q">
      <input type="image" src="img/busca.png" class="lupa" alt="Buscar">
    </form>
  </section>

  <section class="menu-departamentos">
    <h2>Departamentos</h2>

    <nav>
      <ul>
        <li>
          <a href="#">Blusas e Camisas</a>
          <ul>
            <li><a href="#">Manga curta</a></li>
            <li><a href="#">Manga comprida</a></li>
            <li><a href="#">Camisa social</a></li>
            <li><a href="#">Camisa casual</a></li>
          </ul>
        </li>
        <li><a href="#">Calças</a></li>
        <li><a href="#">Saias</a></li>
        <li><a href="#">Vestidos</a></li>
        <li><a href="#">Sapatos</a></li>
        <li><a href="#">Bolsas e Carteiras</a></li>
        <li><a href="#">Acessórios</a></li>
      </ul>
    </nav>
  </section>

  <img src="img/destaque-home.png" alt="Promoção: Big City Night">
</section>

<section class="container paineis">
  <section class="painel novidades">
    <h2>Novidades</h2>
    <ol>
      <?php
        $conexao = mysqli_connect("localhost", "root", "", "WD43");
        //$conexao = mysqli_connect("mysql-mirrorfashion.jelasticlw.com.br", "root", "tq9xVecm5H", "WD43");
        $dados = mysqli_query($conexao, "SELECT * FROM produtos LIMIT 0, 12");
        while($produto = mysqli_fetch_array($dados)):
      ?>

      <li>
        <a href="produto.php?id=<?= $produto["id"] ?>">
          <figure>
            <img src="img/produtos/miniatura<?= $produto["id"] ?>.png" alt="<?= $produto["nome"] ?>">
            <figcaption><?= $produto["nome"] ?> por <?= $produto["preco"] ?></figcaption>
          </figure>
        </a>
      </li>

      <?php endwhile; ?>
    </ol>

    <button type="button">Mostra mais</button>
  </section><!-- fim das novidades -->

  <section class="painel mais-vendidos">
    <h2>Mais Vendidos</h2>

    <ol>
      <?php
        $dados = mysqli_query($conexao, "SELECT * FROM produtos WHERE vendas>=40 LIMIT 0, 12");
        while($produto = mysqli_fetch_array($dados)):
      ?>

      <li>
        <a href="produto.php?id=<?= $produto["id"] ?>">
          <figure>
            <img src="img/produtos/miniatura<?= $produto["id"] ?>.png" alt="<?= $produto["nome"] ?>">
            <figcaption><?= $produto["nome"] ?> por <?= $produto["preco"] ?></figcaption>
          </figure>
        </a>
      </li>

      <?php endwhile; ?>
    </ol>

    <button type="button">Mostra mais</button>
  </section><!-- fim dos mais vendidos -->

</section><!-- fim do principal -->

<script src="js/jquery.js"></script>
<script src="js/home.js"></script>

<?php include("_rodape.php"); ?>