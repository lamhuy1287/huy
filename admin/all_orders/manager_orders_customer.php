<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "project1";
$port = 3306;

// Create connection
$conn = new mysqli($servername, $username, $password,$db_name,$port);

$sql = "SELECT * FROM orders;";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    table{
        border: solid 1px black;
    }
    td, th{
        border: solid 1px black;
    }
  </style>
</head>
<body>
  <table>
    <tr>
      <th>Mã hóa đơn</th>
      <th>Mã khách hàng</th>
      <th>Tên khách hàng</th>
      <th>Số điện thoại</th>
      <th>Địa chỉ</th>
      <th>Trạng thái</th>
      <th>Thời gian đặt</th>      
      <th>Tổng tiền</th>
      <th>Chi tiết</th>
    </tr>
        <?php
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    ?> 
                        <td><?php echo $row['order_id']; ?></td>
                        <td><?php echo $row['customer_id']; ?></td>
                        <td><?php echo $row['customer_name']; ?></td>
                        <td><?php echo $row['customer_phone']; ?></td>
                        <td><?php echo $row['customer_address']; ?></td>
                        <td>
                           <form action="process_change_status.php" method="post">
                           <?php  
                            $data = $row['order_id'];
                             echo "<input name='order_id' value='$data' hidden>";
                             if($row['order_status'] == 0){
                                echo "<button name='accept' value='1' style='margin: 2px;background-color:blue;'>"."Duyệt"."</button>";
                                echo "<button name='cancel' value='-1' style='background-color:red;'>"."Hủy"."</button>";
                             }
                             else if($row['order_status'] == 1){
                                echo "<button name='deliver' value='2' style='background-color:yellow;'>"."Đang giao"."</button>";
                             }
                             else if($row['order_status'] == 2){
                                echo "Thành công";
                             }
                             else{
                                echo "Đơn hàng đã bị hủy";
                             }
                        
                            ?>
                           </form>
                        </td>
                        <td>

                        
                            <?php

                              
                             echo date('d-m-y H:i',$row['created_at']);

                            ?>
                        </td>
                        <td><?php echo $row['total']; ?></td>
                        <form action="./order_details.php" method="post">
                        <td>
                            <?php 
                                echo "<button style='margin: 2px;background-color:green;'>"."Chi tiết"."</button>"; 
                                $data = $row['order_id'];
                                echo "<input name='order_id' value='$data' hidden>";
                            ?>
                        </td>
                        </form>
                        
                    <?php
                    echo "</tr>";
                }
              } else {
                echo "<p>"."Hiện tại chưa có hóa đơn nào được đặt"."</p>";
              }

        ?>
  </table>
</body>
</html>