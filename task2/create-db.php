<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DB worker</title>
</head>
<body>
DB Worker
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "20152015a";
        $dbname = "TestTask";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        
        // $sql = "CREATE TABLE product (
        //     id INT(11) NOT NULL AUTO_INCREMENT,
        //     name VARCHAR(50) NOT NULL DEFAULT \" \",
        //     price DECIMAL(8,2) DEFAULT NULL,
        //     PRIMARY KEY (id))
        //     ENGINE=InnoDB DEFAULT CHARSET=utf8;";

        // $sql = "INSERT INTO product (id, name, price) VALUES
        // (1, 'iPhone', 101.99),
        // (2, 'Samsung Galaxy', 92.99),
        // (3, 'Lenovo P2', 88.79),
        // (4, 'HP Pavilion', 98.79);";

        // $sql = "CREATE TABLE order_customer (
        //     id INT(11) NOT NULL AUTO_INCREMENT,
        //     customer_name VARCHAR (50) NOT NULL DEFAULT \" \" ,
        //     PRIMARY KEY (id))
        //     ENGINE=InnoDB DEFAULT CHARSET=utf8;";

        // $sql = "INSERT INTO order_customer (id, customer_name) VALUES
        //         (1, 'Bob'),
        //         (2, 'Jhon'),
        //         (3, 'Jane'),
        //         (4, 'Anna'),
        //         (5, 'Linda'),
        //         (6, 'Jane'),
        //         (7, 'Anna'),
        //         (8, 'Jane'),
        //         (9, 'Bob'),
        //         (10, 'Bob'),
        //         (11, 'Linda'),
        //         (12, 'Linda');";

        // $sql = "CREATE TABLE order_line (
        //     id int(11) NOT NULL AUTO_INCREMENT,
        //     order_id int(11) NOT NULL,
        //     product_id int(11) NOT NULL,
        //     quantity int(7) NOT NULL,
        //     PRIMARY KEY (id),
        //     FOREIGN KEY (order_id) REFERENCES order_customer(id),
        //     FOREIGN KEY (product_id) REFERENCES product(id))
        //     ENGINE=InnoDB DEFAULT CHARSET=utf8;";
  
        // $sql = "INSERT INTO order_line (id, order_id, product_id, quantity) VALUES
        //         (1, 1, 1, 2),
        //         (2, 1, 3, 3),
        //         (3, 1, 4, 1),
        //         (4, 2, 2, 10),
        //         (5, 2, 3, 5),
        //         (6, 3, 1, 2),
        //         (7, 4, 2, 1),
        //         (8, 5, 4, 6),
        //         (9, 6, 1, 7),
        //         (10, 7, 1, 8),
        //         (11, 7, 4, 5),
        //         (12, 8, 1, 3),
        //         (13, 9, 3, 7),
        //         (14, 10, 2, 10),
        //         (15, 11, 1, 4),
        //         (16, 11, 2, 3),
        //         (17, 12, 1, 7),
        //         (18, 12, 3, 10),
        //         (19, 12, 4, 4);";

        if ($conn->query($sql) === TRUE) {
            echo "Database created successfully";
        } else {
            echo "Error creating database: " . $conn->error;
        }
        
        $conn->close();

    ?>
</body>
</html>

