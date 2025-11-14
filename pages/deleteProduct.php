<?php
$db = new PDO(
    'mysql:dbname=exo_sql;host=127.0.0.1;port=3306;charset=utf8;',
    'root',
    'root_password'
);

$sql = "DELETE FROM product WHERE id = :productid";

$query = $db->prepare($sql);

$query->execute([ ':productid' => $_GET['id'] ]);

header("Location: ../index.php?page=home");
exit();