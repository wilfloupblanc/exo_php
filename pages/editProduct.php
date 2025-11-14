<?php

    if ( $_SERVER["REQUEST_METHOD"] === "GET" )
    {
        $db = new PDO(
                'mysql:dbname=exo_sql;host=127.0.0.1;port=3306;charset=utf8;',
                'root',
                'root_password'
        );

        $sql = "SELECT * FROM product WHERE  id = :productid";

        $query = $db->prepare($sql);

        $query->execute([ 'productid' => $_GET['id'] ]);

        $products = $query->fetch();
    }

    if ( $_SERVER["REQUEST_METHOD"] === "POST" )
    {
        if (
                isset($_POST['name']) && !empty($_POST['name']) &&
                isset($_POST['price']) && !empty($_POST['price']) &&
                isset($_POST['description']) && !empty($_POST['description'])
        )
        {
            $db = new PDO(
                    'mysql:dbname=exo_sql;host=127.0.0.1;port=3306;charset=utf8;',
                    'root',
                    'root_password'
            );
            $sql = "UPDATE product SET name = :name, price = :price, description = :description WHERE id = :productid";

            $query = $db->prepare($sql);

            $query->execute([
                    ':name' => $_POST['name'],
                    ':price' => floatval($_POST['price']),
                    ':description' => $_POST['description'],
                    ':productid' => $_POST['id']
            ]);

            header('Location: index.php?page=home');
            exit();
        }
    }

?>

<main>
    <h1>
        Edit Product
    </h1>

    <form action="" method="POST">

        <p>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="<?= $products['name'] ?>">
        </p>
        <p>
            <label for="price">Price</label>
            <input type="text" id="price" name="price" value="<?= $products['price'] ?>">
        </p>
        <p>
            <label for="description">Description</label>
            <textarea type="textarea" id="description" name="description"><?= $products['description'] ?></textarea>
        </p>

        <input type="hidden" value="<?= $products['id'] ?>" name="id">

        <button type="submit">update</button>
    </form>
</main>
