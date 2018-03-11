<?php
class Product{
    private $name;
    private $promotion;
    private $price;
    private static $listProduct = array();

    function __construct($name, $price, $promotion = false){
        $this->name = $name;
        $this->price = $price;
        $this->promotion = $promotion;
        array_push(Product::$listProduct, $this);
    }

    function getName() {
        return $this->name;
    }

    function getPrice() {
        return $this->price;
    }

    function isPromotion(){
        return $this->promotion;
    }

    static function getProductsList(){
        return Product::$listProduct;
    }
}

// A, B, C, D, E, F, G

new Product('A', 45, true);
new Product('B', 15);
new Product('C', 23, true);
new Product('D', 78);
new Product('E', 56);
new Product('F', 89);
new Product('G', 95);

?>