<?php

    $db = new PDO(
            'mysql:dbname=exo_sql;host=127.0.0.1;port=3306;charset=utf8;',
            'root',
            'root_password'
    );

    $sql = "SELECT * FROM product ORDER BY id DESC";

    $query = $db->prepare($sql);

    $query->execute();

    $products = $query->fetchAll();

?>

<main>
    <h1>Home Page</h1>

    <section>

        <h2>Products</h2>
        <ul>
            <?php
            foreach ($products as $product) : ?>
                <li>
                    <a href="index.php?page=product&id=<?= $product['id'] ?>">
                        <?= $product['name']; ?>
                    </a>
                </li>

            <?php endforeach; ?>
        </ul>
    </section>
</main>