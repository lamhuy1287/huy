<?php
session_start();

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
} elseif (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
} else {
    echo "No product ID provided.";
    exit();
}

// Kết nối cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$database = "project1";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy thông tin sản phẩm được chọn
$sql_product = $conn->prepare("SELECT product_code, name, price, description, image, themes FROM products WHERE id = ?");
$sql_product->bind_param("i", $product_id);
$sql_product->execute();
$result_product = $sql_product->get_result();

$product = $result_product->fetch_assoc();
if (!$product) {
    echo "Product not found.";
    exit();
}

$product_theme = $product['themes'];

// Lấy 5 sản phẩm có cùng themes với sản phẩm được chọn
$sql_related_products = $conn->prepare("SELECT id, product_code, name, price, image FROM products WHERE themes = ? AND id != ? LIMIT 5");
$sql_related_products->bind_param("si", $product_theme, $product_id);
$sql_related_products->execute();
$result_related_products = $sql_related_products->get_result();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            background-color: #F5F5F5;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            background-color: white;
            padding: 20px;
        }
        .left, .right {
            flex: 1;
            min-width: 300px; /* Ensure a minimum width for better responsiveness */
            padding: 10px;
        }
        .custom-image {
            width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
        }
        .btn-dark {
            width: 100%;
            color: white;
        }
        .product {
            width: 18%;
            background-color: white;
            margin-bottom: 20px;
            text-align: center;
            border: 1px solid black;
            padding: 20px;
            border-radius: 10px;
            margin-right: 10px;
        }
        .product img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
            border-radius: 5px;
        }
        .name, .price, .product_code {
            margin-top: 10px;
        }
        .orange-button {
            width: 100%;
            background-color: orange;
            border: 2px solid orange;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 8px;
            transition: background 0.3s, color 0.3s;
        }
        .orange-button:hover {
            background-color: white;
            color: orange;
        }
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }
            .left, .right {
                width: 100%;
            }
            .product {
                width: 100%;
            }
        }
    </style>
</head>
<body>

<div class="container">
        <div class="left">
            <?php
            if ($result_product) {
                echo "<img class='custom-image' src='" . $product['image'] . "' alt='" . $product['name'] . "'/>";
            }
            ?>
        </div>
        <div class="right">
            <div class="col">
                <?php
                if ($result_product) {
                    echo "<h1 class='name'>". $product['name'] . "</h1>";
                    echo "<h3>Themes: ". $product['themes'] . "</h3>";
                    echo "<h3 class='product_code'>Mã sản phẩm: #" . $product['product_code'] . "</h3>";
                    echo "<h3 class='price'>Giá sản phẩm: " . $product['price'] . "$</h3>";
                    echo "<button class='orange-button mb-5'>Thêm vào giỏ hàng</button>";
                }
                ?>
            </div>
        </div>
    </div>


   
</body>

</html>