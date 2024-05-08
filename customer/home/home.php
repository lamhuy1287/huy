<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "project1";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
  die("Kết nối thất bại: " . mysqli_connect_error());
}
$sql = "SELECT id,name, image, price FROM products  ORDER BY id DESC LIMIT 5";
$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        *{
            box-sizing: border-box;
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

        .banner {
            height: auto;
            width: 100%;
            background-color: rgb(9, 30, 49);
            /* Màu nền của banner */
            display: flex;
            justify-content: center;
            /* Canh giữa theo chiều ngang */
            align-items: center;
            /* Canh giữa theo chiều dọc */
            
        }

        .banner img {
            
            max-width: 100%;
            /* Đảm bảo ảnh không vượt quá kích thước của banner */
            max-height: 100%;
            /* Đảm bảo ảnh không vượt quá kích thước của banner */
        }
        

        .content {
            margin-left: 80px;
            /* Khoảng cách từ lề trái */
            margin-right: 80px;
            /* Khoảng cách từ lề phải */
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            /* Chia thành 5 cột bằng nhau */
            grid-gap: 20px;
            /* Khoảng cách giữa các cột */
            margin-top: 20px;
            /* Khoảng cách từ banner xuống div */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* CSS cho từng cột */
        .column {
            background-color: lightgray;
            /* Màu nền của mỗi cột */
            padding: 20px;
            /* Khoảng cách giữa nội dung và viền cột */
            height: 60px;
            border-radius: 15px;
        }

        .column a {
            text-align: center;
            color: #000;
        }

        .container {
            height:auto;
            width: 100%;
            margin: 0 auto;
            padding-top: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
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
            font-weight: bold;
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

        .container_1 {
            display: flex;
            justify-content: space-between;
            width: 1200px;
            margin: 0 auto;
        }

        /* CSS cho mỗi cột */
        .column_1 {
            width: 100%;
            /* Phân chia chiều rộng cho mỗi cột */
            background-color: #f2f2f2;
            padding: 10px;
        }

        /* CSS cho hình ảnh */
        .image {
            width: 100%;
            height: auto;
        }

        /* CSS cho tiêu đề */
        .title {
            font-weight: bold;
            margin-top: 10px;
            text-align: center;
        }

        /* CSS cho phần giới thiệu */
        .description {
            text-align: center;
            margin-top: 5px;
        }

        .container_3 {
            height: auto;
            /* Độ cao của div container */
            display: flex;
            /* Sử dụng flexbox để dễ dàng chia layout */
            background-color: black;
            position: relative;
        }
        .container_3 img {
            width: 100%;
            height: auto;
        }
        .text-container {
            
    position: absolute;
    top: 40%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    width: 100%; /* Đảm bảo văn bản nằm giữa ngang */
}

.text-container h3 {
    
    margin: 0; /* Loại bỏ margin mặc định */
    color: white; /* Màu văn bản */
    font-family: "Times New Roman", Times, serif; 
    font-weight: bold; /* Đậm */
    text-transform: uppercase; /* Chuyển đổi văn bản thành chữ in hoa */
}
.text-container h4 {
    margin: 0; /* Loại bỏ margin mặc định */
    color: white; /* Màu văn bản */
    font-family: "Times New Roman", Times, serif; 
    font-weight: bold; /* Đậm */
    text-transform: uppercase; /* Chuyển đổi văn bản thành chữ in hoa */
}
.text-container h2 {
    margin: 0; /* Loại bỏ margin mặc định */
    color: white; /* Màu văn bản */
    font-family: "Times New Roman", Times, serif; 
    font-weight: bold; /* Đậm */
    text-transform: uppercase; /* Chuyển đổi văn bản thành chữ in hoa */
}
.text-container p {
    margin: 0; /* Loại bỏ margin mặc định */
    color: white; /* Màu văn bản */
    font-family: "Times New Roman", Times, serif; 
    text-transform: uppercase; /* Chuyển đổi văn bản thành chữ in hoa */
}
        .container_4 {
            display: flex;
            height: 230px;
        }

        .column_4 {
            flex: 1;
            /* Thêm viền để phân biệt các cột */
            padding: 10px;
            /* Thêm khoảng cách nội dung từ viền */
            text-align: center;
            /* Canh giữa nội dung trong cột */
            margin: 0 10px;
        }

        .End {
            background-color: #e6e6e6;
            height: auto;
            margin-left: 70px;
            margin-right: 70px;
        }
        .footer{
            height: auto;
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
                <a href="../../admin/login_logout/login.php">
                    <button type="button" class="btn btn-outline btn-login" onclick="window.location.href = 'login.html';">
                        <i class='bx bxs-user'></i> Login
                    </button>
                </a>
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


    <div class="banner" style="position: relative;">
    <img src="https://collider.com/wp-content/uploads/2017/09/lego-ninjago-movie-illustration-banner.jpg" alt="">
    <a href="ninjago.php" style="position: absolute; top: 90%; right: 70px; transform: translateY(-50%); background-color: rgb(252,188,56); color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">See More</a>
</div>

   
    <div class="content">
        <!-- Cột 1 -->
        <div style="background-color: rgb(252,188,56);" class="column">
            <a href="new.php">New</a>
        </div>

        <!-- Cột 2 -->
        <div style="background-color: rgb(252,188,56);" class="column">
            <a href="technic.php">Technic</a>
        </div>

        <!-- Cột 3 -->
        <div style="background-color: rgb(252,188,56);" class="column">
            <a href="disney.php">Disney</a>
        </div>

        <!-- Cột 4 -->
        <div style="background-color: rgb(252,188,56);" class="column">
            <a href="hero.php">Hero</a>
        </div>

        <!-- Cột 5 -->
        <div style="background-color: rgb(252,188,56);" class="column">
            <a href="dreamzzz.php">DREAMZzz™</a>
        </div>

        <!-- Cột 6 -->
        <div style="background-color: rgb(252,188,56);" class="column">
            <a href="ninjago.php">NINJAGO®</a>
        </div>


    </div>
    <br>
    <p style="font-size: 30px;margin-left: 35px;">New sets :</p>

    <div class="container">
        <?php while ($row = mysqli_fetch_assoc($result)) { 
           echo "<div class='product'>";
           echo "<img class='img-fluid' src='".$row['image']."' alt='".$row['name']."'/>";
           echo  "<hr style='border:1px solid black;'>";
           echo "<b class='name'>".$row['name']."</b>";  
           echo "<br>";
            echo "<b class='price'>".$row['price']." $</b>"; 
            echo "<form method ='POST' action='preview.php'>";
            $product_id = $row["id"];
            echo "<input name='product_id' value='$product_id' hidden>";
            echo "<button type='submit' class='orange-button'>View</button>";
            echo "</form>";
            echo "</div>";
         } ?>
    </div>
  
    <br>
    <p style="font-size: 30px;margin-left: 35px;">This week's top picks :</p>
    <div class="container_1">
        <!-- Cột 1 -->
        <div class="column_1">
            <img class="image" src="https://www.lego.com/cdn/cs/set/assets/blt27ac7acf67523393/76271-Exclusive-202404-Block-Standard-3.jpg?fit=crop&format=webply&quality=80&width=635&height=440&dpr=1.5" alt="Image 1">
            <div class="title">
                <p>New Batman: The Animated </p>
                <p>Series Gotham City™</p>
            </div>
            <div class="description">
                <p>Illuminate an icon with this spectacular new cityscape.</p>
                <a style="color: #000;" href="#">Shop now ></a>
            </div>
        </div>

        <!-- Cột 2 -->
        <div class="column_1">
            <img class="image" src="https://www.lego.com/cdn/cs/set/assets/blt97165949f6e35edc/21348-Exclusive-202404-PDP-GameNight-Block-Standard.jpg?fit=crop&format=webply&quality=80&width=635&height=440&dpr=1.5" alt="Image 2">
            <div class="title">
                <p>New Dungeons & Dragons:</p>
                <p> Red Dragon’s Tale</p>
            </div>
            <div class="description">
                <p>Build an adventure like never before</p>
                <a style="color: #000;" href="#">Shop now ></a>
            </div>
        </div>

        <!-- Cột 3 -->
        <div class="column_1">
            <img class="image" src="https://www.lego.com/cdn/cs/set/assets/blt7ab5668500f26d43/10332-Homepage-202403-Block-Standard.jpg?fit=crop&format=webply&quality=80&width=635&height=440&dpr=1.5" alt="Image 3">
            <div class="title">
                <p>New Medieval Town Square</p>
            </div>
            <div class="description">
                <p>New Medieval Town Square</p>
                <a style="color: #000;" href="#">Shop now ></a>
            </div>
        </div>
    </div>
    <br>
    <p style="font-size: 30px;margin-left: 35px;">Spotlight on…</p>
    <div class="container_3">

        <img src="https://www.lego.com/cdn/cs/set/assets/blt684048c4fb6edf33/21348-Exclusive-202404-Homepage-SL-Hero-Standard-Large.jpg?fit=crop&format=webply&quality=80&width=1600&height=500&dpr=1.5" alt="">
        <div class="text-container">
        <h3>Dungeons</h3>
        <h4>& Dragon</h4>
        <br>
        <h2>Build an adventure like </h2>
        <h2>never before</h2>
        <br>
        <p>Start an epic quest with new Dungeons & Dragons:</p>
        <p>Red Dragon’s Tale.</p>
        <a href="ninjago.php" style="position: absolute; top: 150%; right: 44%; transform: translateY(-50%); background-color: red; color: white; padding: 10px 40px; text-decoration: none; border-radius: 5px;">See More</a>


        </div>
    </div>
    <br>
    <div>
    <h4 style="text-align: center;font-size: 30px;">Find inspiration, share your creation</h4>
    <p style="text-align: center;">Post your photos to Instagram and mention @LEGO in the caption for a chance to be
        featured on the</p>
    <p style="text-align: center;">website and shop the sets you like below.</p>
    </div>
    <br>
    <div class="container_4">
        <div class="column_4"><img  class="image" src="https://www.lego.com/cdn/cs/set/assets/blteb6d782e63fd9de2/10280_Block_Standard_3.jpg?fit=crop&format=jpg&quality=80&width=635&height=440&dpr=1" alt=""></div>
        <div class="column_4"><img  class="image" src="https://www.lego.com/cdn/cs/set/assets/bltba80026c04e00dd2/240123_Design_brief_Article_assets_Roots_Card_Content.jpg?fit=crop&format=webply&quality=80&width=635&height=440&dpr=1.5" alt=""></div>
        <div class="column_4"><img class="image" src="https://www.mykingdom.com.vn/cdn/shop/articles/mykingdom-do-choi-lap-rap-lego-creator-image.jpg?v=1686020279" alt=""></div>
        <div class="column_4"><img class="image" src="https://www.lego.com/cdn/cs/set/assets/blta36ab46b5a372960/HERO_Mobile.jpg?fit=crop&format=webply&quality=80&width=635&height=440&dpr=1.5" alt=""></div>
    </div>
    <br>
    
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
<div class="footer">
    <hr style="border:1px solid black;">
<br>
        <div class="container" style="background-color:white;row row-cols-3">
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
                        <li><a href="https://www.messenger.com/e2ee/t/6948976355124079">Liên hệ hỗ trợ</a></li>
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
</div>
</html>