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
    <section class="form-container">
        <form action="" method="POST" class="col-12">

            <label for="name" class="col-12">Name</label>
            <input type="text" id="name" name="name" class="col-12">

            <label for="price" class="col-12">Price</label>
            <input type="text" id="price" name="price" class="col-12">

            <label for="description" class="col-12">Description</label>
            <textarea type="textarea" id="description" name="description" class="col-12"></textarea>

            <article class="submit-container" class="col-12">
                <a href="" type="submit" class="bg-primary border-primary text-light">Ajouter</a>
            </article>
        </form>
    </section>
</main>
