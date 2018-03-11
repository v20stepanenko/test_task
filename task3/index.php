<?php 
    include 'head.php';
    include 'products.php';
    include 'footer.php';
 ?>

<?php get_head() ?>
<body>
    <div class="cart">
        <span>Корзина:</span>
        <div id="cart"></div>
        <span id="coast"></span>
    </div>
    <div class="products-block">
        PRODUCTS:
        <?php foreach(Product::getProductsList() as $item){ ?>
            <div class="product" <?php if($item->isPromotion()) echo "data-promotion=\"true\"" ?> >
                <h3 class="product_name"><?php echo $item->getName() ?></h3>
                <div class="product_price">Price: <span><?php echo $item->getPrice() ?></span></div>
            </div>
        <?php } ?>
    </div>
</body>
<?php get_footer() ?>