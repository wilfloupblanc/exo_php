<?php

    if (
        $_SERVER['REQUEST_METHOD'] === 'POST'
    )
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
            $sql = "INSERT INTO product (name, price, description) VALUES(:name, :price, :description)";

            $query = $db->prepare($sql);

            $query->execute([
                ':name' => $_POST['name'],
                ':price' => floatval($_POST['price']),
                ':description' => $_POST['description']
            ]);

            header('Location: index.php?page=home');
            exit();
        }
        else {
            var_dump("Tous les champs sont obligatoires");
        }
    }

?>


<main>
    <h1>
        New Product
    </h1>

    <form action="" method="POST">

        <p>
            <label for="name">Name</label>
            <input type="text" id="name" name="name">
        </p>
        <p>
            <label for="price">Price</label>
            <input type="text" id="price" name="price">
        </p>
        <p>
            <label for="description">Description</label>
            <textarea type="textarea" id="description" name="description"></textarea>
        </p>
        <button>Add</button>
    </form>
</main>
