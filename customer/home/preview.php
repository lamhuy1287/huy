<?php
$product_id = $_POST['product_id'];

#kết nối cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$database = "project1";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
  die("Kết nối thất bại: " . mysqli_connect_error());
}

$sql_product = "SELECT product_code, name, price, description, image, themes FROM products WHERE id='$product_id' ";
$result_product = mysqli_query($conn, $sql_product);

// if(mysqli_num_rows($result_product) > 0) {
//     $row_product = mysqli_fetch_assoc($result_product);
//     $themes = $row_product['themes'];
    
//     $sql_related_products = "SELECT product_code, name, price, description, image FROM products WHERE themes='$themes' AND id != '$product_id' LIMIT 4";
//     $result_related_products = mysqli_query($conn, $sql_related_products);
// }
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
       *{
            box-sizing: border-box;
        }
        body{
            background-color:#F5F5F5;
        }
        .header {
            height: 130px;
            width: 100%;
            background-color: rgb(252,188,56);
            display: flex;
            flex-direction: column;
            /* Arrange children in a column */
        }

        .header_1 {
            height: 40px;
            width: 100%;
            background-color: aliceblue;
            display: flex;
        }

        .header_2 {
            height: 90px;
            /* Changed height to accommodate the image height */
            width: 100%;
            display: flex;
        }

        .a1,
        .a3 {
            height: 40px;
            width: 25%;
            background-color: rgb(255, 255, 255);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .a2 {
            height: 40px;
            width: 50%;
            background-color: rgb(255, 255, 255);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .b1 {
            height: 90px;
            width: 50%;
            display: flex;
            align-items: center;
            /* Center vertically */
            padding-left: 20px;
            /* Add padding to separate items from the left edge */
        }

        .b2 {
            height: 90px;
            width: 50%;
            background-color:rgb(252,188,56);
            /* Just for visualization */
            display: flex;
            align-items: center;
            /* Center vertically */
            justify-content: flex-end;
            /* Push buttons to the right */
            padding-right: 60px;
        }

        .btn-login {
            border: none;
        }

        .b1 img {
            margin-right: 20px;
            /* Add margin to separate the image from buttons */
        }

        .btn-page {
            margin-right: 15px;
            /* Add margin between buttons */
            border: none;
            font-size: 20px;
        }
        #search-box{
            background: #fff;
            border-radius: 30px;
        }
        #search-box #search-text{
            border: none;
            outline: none;
            background: none;
            font-size: 15px;
            width: 0;
            padding: 0;
            transition: all 0,25s ease-in-out;
        }
        #search-box:hover #search-text,#search-box #search-text:valid{
            width: 300px;
            padding: 10px 0px 10px 15px;
        }
        #search-btn{
            border: none;
            background-color: white;
            cursor: pointer;
            padding:15px;
            border-radius: 50%;
            font-size: 13px;
        }
        .container{
            display:flex;
            height:auto;
            width:100%;
            background-color:white;
        }
        .left{
            display:flex;
            width:45%;
           
        }
        .custom-image {
    width: 75%;
    height:75%;
    display: flex;
    margin-top:10%;
    margin-left:5%;
   
 }

        .right{
            display:flex;
            height:100%;
            width:55%;
           
        }
        .btn-dark{
            width: 100%;
            color:white;
        }
        
    
        .product {
            width: 18%;
            background-color: white;
            margin-bottom: 20px;
            text-align: center;
            border: 1px solid black;
            padding: 20px;
            border-radius: 10px;
        }
        .product img {
            max-width: 100%;
            height: 50%;
            display: block;
            margin: 0 auto;
            border-radius: 5px;
        }
        .name{
            margin-top: 10px;
            height:10%;
        }
        .price {
            margin-top: 10px;
            color: #333;
        }
        hr{
            
        }
        .orange-button {
  width: 100%;
  background-color: orange; /* Màu nền của button */
  border: 2px solid orange; /* Màu viền và độ dày viền */
  color: white; /* Màu chữ */
  padding: 10px 20px; /* Khoảng cách giữa chữ và viền button */
  text-align: center; /* Căn giữa chữ trong button */
  text-decoration: none; /* Bỏ gạch chân cho text (nếu có) */
  display: inline-block; /* Loại hiển thị */
  font-size: 16px; /* Kích thước font chữ */
  margin: 4px 2px; /* Khoảng cách giữa các button nếu có nhiều button */
  cursor: pointer; /* Hiệu ứng con trỏ khi di chuyển vào button */
  border-radius: 8px; /* Độ bo tròn của viền */
  transition: background 0.3s, color 0.3s; /* Hiệu ứng chuyển màu nền và chữ khi hover */
  }

   .orange-button:hover {
  background-color: white; /* Màu nền khi hover */
  color: orange; /* Màu chữ khi hover */
  }
  
  .End {
            display:flex;
            background-color: #e6e6e6;
            height: auto;
            margin-top:20px;
            margin-left: 10%;
            margin-right: 10%;
        }
       
</style>
</head>
<body>
<div class="header">
        <div class="header_1">
            <div class="a1"></div>
            <div class="a2">
                <p>
                    <i class='bx bx-chevron-left'></i>
                    Free ship toàn quốc cho đơn hàng trên 1.000.000 VNĐ
                    <a href="#">Learn more</a>
                    <i class='bx bx-chevron-right'></i>
                </p>
            </div>
            <div class="a3">
                <button type="button" class="btn btn-outline btn-login" onclick="window.location.href = 'login.html';">
                    <i class='bx bxs-user'></i> Login
                </button>
                | Join LEGO® Insiders
            </div>
        </div>
        <div class="header_2">
            <div class="b1">
                <img style="justify-content: center;" height="80px" width="80px"
                    src="logo.png" alt="">
                <button id="home" type="button" class="btn btn-outline-light text-dark btn-page">Home</button>
                <script>
     document.getElementById("home").onclick = function () {
        location.href = "home.php";
    };
        </script>
                <div class="dropdown">
    <button type="button" class="btn btn-outline-light text-dark btn-page"  data-toggle="dropdown">Themes</button>
    <ul class="dropdown-menu">
      <li><a href="disney.php">Disney</a></li>
      <li><a href="friends.php">Friends</a></li>
      <li><a href="technic.php">Technic</a></li>
      <li><a href="dreamzzz.php">Dreamzzz</a></li>
      <li><a href="ninjago.php">NinjaGo</a></li>
    </ul>
  </div>
                <button id="help" type="button" class="btn btn-outline-light text-dark btn-page">Help</button>
                <script>
     document.getElementById("help").onclick = function () {
        location.href = "help.php";
    };
        </script>
            </div>
            <div class="b2">
                <form action="" id="search-box">
                    <input type="text" id="search-text" placeholder="Tìm kiếm sản phẩm" required>
                    <button id="search-btn"><i  class='bx bx-search'></i></button>
                </form>
                <button style="background-color: rgb(252,188,56);border: none;" type="button" class="btn btn-light"><i
                        class='bx bxs-cart'></i></button>
            </div>
        </div>
</div>
<br>
<br>
<div class="container">
<div class="left">
    <?php
    while ($row = mysqli_fetch_assoc($result_product)) {
       
        echo "<img class='custom-image' src='" . $row['image'] . "' alt='" . $row['name'] . "'/>";
    }
    ?>
</div>

    <div class="right">
    <div class="col">
    <?php
    mysqli_data_seek($result_product, 0); // Đưa con trỏ dữ liệu về lại đầu
    while ($row = mysqli_fetch_assoc($result_product)) {
        echo "<h2 class='name'>". $row['name'] . "</h2>";
        echo "<br>";
        echo "<h3>Themes: ". $row['themes'] . "</h3>";
        echo "<br>";
        echo "<h3 class='product_code'>Mã sản phẩm: #" . $row['product_code'] . "</h3>";
        echo "<br>";
        echo "<h3 class='price'>Giá sản phẩm: " . $row['price'] . "$</h3>";
        echo "<br>";
        echo "<br>";
        echo "<button class='orange-button mb-5'>Thêm vào giỏ hàng</button>";
    }
    ?>
</div>
</div>
</div>
<br>
<h2 style="text-align:center;">Description</h2>
<div class="container">
    <hr>
    <div class="row">
    <div class="col">
    <?php
    mysqli_data_seek($result_product, 0); // Đưa con trỏ dữ liệu về lại đầu
    while ($row = mysqli_fetch_assoc($result_product)) {
        echo "<h3 class='description'>" . $row['description'] . "</h3>";
    }
    ?>
</div>

    </div>
    <hr>
</div>
<br>
<h2 style="text-align:center;">Sản phẩm tương ứng</h2>

    <div class="End">
        <p style="margin-left: 30px;margin-right: 30px;text-align: center;justify-content: center;">Welcome to the
            Official LEGO® Shop, the amazing home of LEGO building toys, gifts, stunning display sets and more for kids
            and adults alike. Find the perfect gift for toddlers, kids, teens and adults for birthdays or other
            occasions such as Valentine's Day, Mother's Day and Father's Day. We make it easy to shop for toys that will
            provide hours of fun and imaginative play. You’ll also find curated LEGO sets for adults perfectly matching
            their interests, such as cars, flowers, gaming and much more!
        </p>
    </div>
    <br>

</body>
<footer >
    <hr style="border:1px solid black;">
<br>
        <div class="container" style="background-color:#F5F5F5;row row-cols-3">
            <div class="row w-100">
                <div class="col" >
                    
                    <h3>Liên hệ</h3>
                    <p>Địa chỉ:Phú Diễn , Bắc Từ Liêm ,Hà Nội</p>
                    <p>Email: lamhuy26@gmail.com</p>
                    <p>Điện thoại: 0377006359</p>
                </div>
                <div class="col">
                    <h3>Liên kết</h3>
                    <ul>
                        <li><a href="home.php">Trang chủ</a></li>
                        <li><a href="new.php">Sản phẩm</a></li>
                        <li><a href="https://www.facebook.com/profile.php?id=100056716461282">Giới thiệu</a></li>
                        <!-- Thêm các liên kết khác -->
                    </ul>
                </div>
                <div class="col">
        <h3>Bản đồ</h3>
    <div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14894.008647910136!2d105.75368688691543!3d21.052596739639352!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454dc9b34f767%3A0xd6b847b3f4d5a4a0!2zUGjDuiBEaeG7hW4sIELhuq9jIFThu6sgTGnDqm0sIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1711990425983!5m2!1svi!2s" width="300" height="200" style="border:0;" allowfullscreen="" loading="lazy" 
        referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
     </div>      
</footer>
</html>