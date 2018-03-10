<?php 

class Customer{
    private $name;
    private $order = array();

    function __construct($name){
        $this->name = $name;
    }

    function addOrder($number_order, $product_price, $quantity){
        $costPosition = $product_price * $quantity;
        $this->order[$number_order] += $costPosition;
        $this->order[$number_order];
    }

    function getTotalCost(){
        $totalCoast = 0;
        foreach($this->order as $order_position){
            $totalCoast += $order_position;
        }
        return round($totalCoast, 2);
    }
    function getLastOrderCost($lastOrder){
        $soreder_keys = array_keys($this->order);
        $needKeys = array_slice($soreder_keys, -1*$lastOrder, $lastOrder, true);
        $need_orders = array();
        
        for($i = 0; $i < count($needKeys); $i++){
            $number_order = $needKeys[$i];
            $priceOrder = $this->order[$number_order];
            $newOrder;
            $newOrder->order = $number_order;
            $newOrder->priceOrder = round($priceOrder, 2);
            array_push($need_orders, $newOrder);
        }    

        return (object) $need_orders;
    }

    function getName(){
        return $this->name;
    }
}

class DBWorker{
    private $servername = "localhost";
    private $username = "root";
    private $password = "20152015a";
    private $dbname = "TestTask";
    
    function getCustomerList(){
            $servername = $this->servername;
            $username = $this->username;
            $password = $this->password;
            $dbname = $this->dbname;
          $conn = new mysqli($servername, $username, $password, $dbname);
    
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        
        $sql_get_customer_order = "SELECT order_customer.customer_name, order_line.order_id, product.price, order_line.quantity
               FROM order_line INNER JOIN order_customer ON order_line.order_id=order_customer.id 
               INNER JOIN product on order_line.product_id=product.id;";
        $result = $conn->query($sql_get_customer_order);
    
    
        $customerList = array();
    
        if ($result->num_rows > 0) {
            // output data of each row
            $arrOrder = array();
            $arrOrder[$testName] = '';
            while($row = $result->fetch_assoc()) {
                $name = $row["customer_name"];
                if(!$customerList[$name]){
                    $customerList[$name] = new Customer($name);
                }
                $customer = $customerList[$name];
                $customer->addOrder($row["order_id"], $row["price"], $row["quantity"]);
            }
        }
    
        $conn->close();
    
        return $customerList;
    }
}

?>
