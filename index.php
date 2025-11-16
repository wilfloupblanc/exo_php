<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="
    https://cdn.jsdelivr.net/npm/phosphor-icons@1.4.2/src/css/icons.min.css
    " rel="stylesheet">
    <link rel="stylesheet" href="./assets/styles/index.css">
</head>
<body>
    <header class="bg-primary">

        <a href="index.php?page=home" class="logo"><img src="./assets/images/logo_exo.png" alt="logo e-commerce de couleur vert sapin"></a>

        <section class="links">
            <a href="index.php?page=signIn" class="text-light user"><i class="ph ph-user-circle"></i></a>

            <label for="burger" class=" burger text-light">
                <i class="ph ph-list"></i>
            </label>
            <input type="checkbox" id="burger">
            <nav class="bg-primary">
                <a href="index.php?page=about" class="text-light">About</a>
                <a href="index.php?page=newProduct" class="text-light">New Product</a>
            </nav>
        </section>

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
    <footer class="bg-primary">
        <h3 class="text-light"><i class="ph ph-copyright"></i> Wilf Loupblanc</h3>
    </footer>
</body>
</html>
