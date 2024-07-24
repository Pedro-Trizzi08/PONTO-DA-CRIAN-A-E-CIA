<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>

<main>
    <section id="hero">
        <h1>Bem-vindo ao Ponto da Criança e Cia</h1>
        <p>Compre os melhores produtos infantis aqui!</p>
    </section>

    <section id="search">
        <form action="pages/search.php" method="get">
            <input type="text" name="query" placeholder="Pesquisar produtos">
            <button type="submit">Pesquisar</button>
        </form>
    </section>

    <section id="products">
        <h2>Produtos em Destaque</h2>
        <div class="product-grid">
            <?php
            include 'config.php';
            $stmt = $pdo->query("SELECT * FROM products LIMIT 8");
            while ($row = $stmt->fetch()) {
                echo '<div class="product">';
                echo '<img src="uploads/' . $row['image'] . '" alt="' . $row['name'] . '">';
                echo '<h3>' . $row['name'] . '</h3>';
                echo '<p>' . $row['description'] . '</p>';
                echo '<p>R$' . number_format($row['price'], 2, ',', '.') . '</p>';
                echo '</div>';
            }
            ?>
        </div>
    </section>
</main>

<section id="social-media">
    <h2>Siga-nos nas Redes Sociais</h2>
    <ul>
        <?php
        $social_stmt = $pdo->query("SELECT * FROM social_links");
        while ($social_row = $social_stmt->fetch()) {
            echo '<li><a href="' . $social_row['url'] . '" target="_blank">' . $social_row['name'] . '</a></li>';
        }
        ?>
    </ul>
</section>

<?php include 'includes/footer.php'; ?>
