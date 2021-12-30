<?php
    class Product {
        private $_name;
        private $_price;
        function __construct($name, $price) {
            $this->_name = $name;
            $this->_price = $price;
        }
        function getProduct() {
            $arr['name'] = $this->_name;
            $arr['price'] = $this->_price;
            return $arr;
            // return "Name {$this->_name}, price {$this->_price}";
        }
    }
    // $p = new Product('Кукла', '200');

    // var_dump($p); Вывод имени и цены
    // echo "<p>{$p->getProduct()}</p>";
?>