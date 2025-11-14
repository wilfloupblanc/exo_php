<?php

    $db = new PDO(
        'mysql:dbname=exo_sql;host=127.0.0.1;port=3306;charset=utf8;',
        'root',
        'root_password'
    );

    $sql = "SELECT * FROM product WHERE id = :productid";

    $query = $db->prepare($sql);

    $query->execute([':productid' => $_GET['id']]);

    $product = $query->fetch();

?>

<main>
    <h1><?= $product['name'] ?></h1>
    <span><?= $product['price'] ?></span>
    <p>
        <?= $product['description'] ?>
    </p>
    <a href="./pages/deleteProduct.php?id=<?= $product['id']?>">Delete</a>
    <a href="index.php?page=editProduct&id=<?= $product['id']?>">Edit</a>
</main>
