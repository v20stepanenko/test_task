;
document.addEventListener("DOMContentLoaded", function() {
    
    void function() {

        // проверяем поддержку
        if (Element.prototype.closest) return;
        // реализуем
        Element.prototype.closest = function(css) {
            var node = this;
    
            while (node) {
            if (node.matches(css)) return node;
            else node = node.parentElement;
            }
            return null;
        };
        
    }();

    void function () {
        var cart = document.getElementById('cart');
        var productsBlock = document.getElementsByClassName('products-block');

        const getProductPrice = function (){
        return this.querySelector(".product_price span").textContent;
        }

        const getProductName = function () {
        return this.querySelector(".product_name").textContent;
        }

        const isProductPromotion = function () {
            return this.dataset.promotion;
        }

        cart.generatorIdProduct = 0;
        cart.productList = {};
        const addProductToCart = (product) => {
            const {name} = product;
            if(cart.productList[name]){
                cart.productList[name].count +=1;
            }else{
                product.count = 1;
                cart.productList[name] = product;
            }
        }

        cart.plusProduct = (name) => {
            cart.productList[name].count += 1;
            cart.render();
        }

        cart.minusProduct = (name) => {

            cart.productList[name].count -= 1;
            if(cart.productList[name].count === 0){
                delete cart.productList[name];
            }
            cart.render();
        }

        cart.discount = function () {
            let discount;
            if(this.count >= 3){
                discount = 5;
            }
            if(this.count >2 && this.isPromotion){
                discount = 10;
            }
            if(this.totalCoast >= 100){
                discount = 15;
            }
            return discount;
        }

        cart.render = function () {
            const {productList} = cart;
            cart.count = 0;
            cart.totalCoast = 0;
            const cartDiv = document.createElement('div');
            this.compareDocumentPosition
            for(const prop in productList){

                const product = productList[prop];

                cart.count += product.count;
                if(product.promotion){
                    cart.isPromotion = true;
                }

                cart.totalCoast += product.price * product.count;
                const productDiv = document.createElement('div');
                const plusProduct = document.createElement('button');
                plusProduct.textContent = "+";
                plusProduct.onclick = () => {
                    cart.plusProduct(prop);
                }

                const minusProduct = document.createElement('button');
                minusProduct.textContent = "-";
                minusProduct.onclick = () => {
                    cart.minusProduct(prop);
                }

                productDiv.textContent = `Name: ${product.name} price: ${product.price} quantity: ${product.count}`
                productDiv.appendChild(plusProduct);
                productDiv.appendChild(minusProduct);
                cartDiv.appendChild(productDiv);
            }
            
            const coast = document.createElement('div');
            const discount = cart.discount();
            if(discount){
                coast.textContent = `Общая стоимость: ${cart.totalCoast} - ${discount}% = ${cart.totalCoast - (cart.totalCoast*discount/100)}`;
            }else{
                coast.textContent = `Общая стоимость: ${cart.totalCoast}`;
            }

            cart.innerHTML = '';
            cart.appendChild(cartDiv);
            cart.appendChild(coast)

        }

        const plusProduct = (productName) => {
            cart.productList
        }

            productsBlock[0].onclick = function (event){
                var product = event.target.closest(".product");
                product.getPrice = getProductPrice.bind(product);
                product.getName = getProductName.bind(product);
                product.isPromotion = isProductPromotion.bind(product);
                const productToCart = {
                    name: product.getName(),
                    price: product.getPrice(),
                    promotion: product.isPromotion()
                }

                addProductToCart(productToCart);
                cart.render();
            }
        
}();
});