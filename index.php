<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <header>
        <nav>
            <a href="index.php?page=home">Home</a>
            <a href="index.php?page=about">About</a>
            <a href="index.php?page=newProduct">New Product</a>
        </nav>
    </header>

    <?php
        if(array_key_exists('page', $_GET)) {
            switch ($_GET['page'])
            {
                case 'home':
                case 'about':
                case 'product':
                case 'newProduct':
                case 'editProduct':
                    $page = $_GET['page'];
                    break;
                default:
                    $page = 'notFound';
            }
        }
        else
        {
            header('Location: index.php?page=home');
            exit();
        }

        include_once './pages/' . $page . '.php';
    ?>
    <footer>
        <p>Ceci est un footer</p>
    </footer>
</body>
</html>
