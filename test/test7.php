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
    <title>Product Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            background-color: #F5F5F5;
        }
        .container {
            background-color: white;
            margin-top: 20px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .custom-image {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }
        .product-details {
            padding: 20px;
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
        .related-products {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }
        .product {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            width: 18%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }
        .product img {
            max-width: 100%;
            border-radius: 10px;
        }
        .product:hover {
            transform: scale(1.05);
        }
        .product .name {
            margin-top: 10px;
            font-size: 1.1em;
        }
        .product .price {
            color: #333;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <?php echo "<img class='custom-image' src='" . $product['image'] . "' alt='" . $product['name'] . "'/>"; ?>
        </div>
        <div class="col-md-6 product-details">
            <?php
            echo "<h2>" . $product['name'] . "</h2>";
            echo "<p>Themes: " . $product['themes'] . "</p>";
            echo "<p>Mã sản phẩm: #" . $product['product_code'] . "</p>";
            echo "<p>Giá sản phẩm: " . $product['price'] . "$</p>";
            echo "<button class='orange-button'>Thêm vào giỏ hàng</button>";
            ?>
        </div>
    </div>
    <hr>
    <h3>Description</h3>
    <p><?php echo $product['description']; ?></p>
    <hr>
    <h3>Sản phẩm tương ứng</h3>
    <div class="related-products">
        <?php
        while ($related_product = $result_related_products->fetch_assoc()) {
            echo "<div class='product'>";
            echo "<img src='" . $related_product['image'] . "' alt='" . $related_product['name'] . "'/>";
            echo "<a href='preview.php?product_id=" . $related_product['id'] . "' class='name'>" . $related_product['name'] . "</a>";
            echo "<p class='price'>" . $related_product['price'] . "$</p>";
            echo "</div>";
        }
        ?>
    </div>
</div>

</body>
</html>

<?php
$conn->close();
?>
