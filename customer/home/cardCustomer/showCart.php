<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "project1";
$port = 3306;
// Create connection
$conn = new mysqli($servername, $username, $password,$db_name,$port);
// print_r($_SESSION['cart']);exit;
if(isset($_SESSION['cart'])){
$array_keys = array_keys($_SESSION['cart']);
$max = count($array_keys);
}
else{
  echo "Chưa có sản phẩm nào trong giỏ";
}
      

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Show Cart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
      table,
      th,
      td {
        border: 1px solid black;
        border-collapse: collapse;
      }
    </style>
  </head>
  <body>
    <h1>Show Cart Customer</h1>
    
    <table>
      <tr>
        <th>id</th>
        <th>product_code</th>
        <th>name</th>
        <th>price</th>
        <th>quantity</th>
        <th>themes</th>
        <th>description</th>
        <th>image</th>
        <th>Total</th>
      </tr>
      <?php
      if($max == 1){
        echo "Giỏ hàng hiện chưa có gì??? Bạn hãy đi lựa chọn sản phẩm phù hợp nào";
       }
        for($i = 0; $i < $max; $i++){
            $sql = "SELECT * FROM products WHERE id=$array_keys[$i];";
            
            $result = $conn->query($sql);
            if ($result === false) {
                //  echo "<tr><td colspan='9'>Error: " . $conn->error . "</td></tr>";
                continue;
            }
            
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                  ?>
                            <td><?php echo $row['id']?></td>
                    <td><?php echo $row['product_code']?></td>
                    <td><?php echo $row['name']?></td>
                    <td><?php echo $row['price']?></td>
                    <td>
                        <a class="fa-solid fa-plus" href='processAddToCard.php?status=plus&id=
                        <?php
                            echo $array_keys[$i];
                        ?>
                        '></a>
                            <?php echo $_SESSION['cart'][$array_keys[$i]]?>
                        <a class="fa-solid fa-minus" href='processAddToCard.php?status=minus&id=
                        <?php
                            
                            echo $array_keys[$i];
                        ?>
                        '></a>
                    </td>
                    <td><?php echo $row['themes']?></td>
                    <td><?php echo $row['description']?></td>
                    <td><img height='100px;' src="../<?php echo $row['image']?>" alt="no image"></td>
                    <td><?php echo $row['price']*$_SESSION['cart'][$array_keys[$i]]?></td>
                  <?php
                  echo "</tr>";
                }
              } 
        
            
            ?>
            
            
            <?php
             
             
        }
      ?>
    </table>
  </body>
</html>
