<?php
require_once 'index1.php';
session_start();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action='index1_1.php' method='GET'>
        <input type='text' name='nameProduct'><br/>
        <input type='text' name='priceProduct'><br/>
        <input type='submit' value='Добавить'>
    </form>
    <?php
    if (isset($_SESSION['getArray'])) {
        $pp=$_SESSION['getArray'];
    }
    else {
        $pp = [new Product('кукла', 200), 
        new Product('машинка', 300),
        new Product('пирамидка', 100)];
        $_SESSION['getArray'] = $pp;
    }
    
    // var_dump($pp);
    if (isset($_GET['nameProduct'])) {
        if ($_GET['nameProduct'] != '' && $_GET['priceProduct'] != '') {
            $pp[] = new Product($_GET['nameProduct'], $_GET['priceProduct']);
            $_SESSION['getArray'] = $pp;
        }
    }
    foreach($pp as $prod) {
        $arr = $prod->getProduct();
        echo "<p>Наименование: {$arr['name']}, Цена: {$arr['price']}</p>";
    }
    function searchByName($arr, $search) {
        foreach ($arr as $prod) {
            $product = $prod->getProduct();
            if ($product['name'] == $search) {
                echo "<p style= 'border: 1px solid grey; padding: 10px;'>Наименование: {$product['name']}, Цена: {$product['price']}</p>";
            }
        }
    }
    searchByName($pp, 'машинка');
    ?>
</body>
</html>