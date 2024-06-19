<?php
session_start();
// show info of customer
if(!isset($_SESSION["customer_id"])){
    header('location:/doAn/admin/login_logout/login.php');
    exit;
}

$servername = "localhost";
$username = "root";
$password = "";
$db_name = 'project1';
$port = 3306; 
// Create connection
$conn = new mysqli($servername, $username, $password,$db_name,$port);
$id = $_SESSION["customer_id"];
$sql = 'select * from customers where id='.$id;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  $row = $result->fetch_assoc();
  $customer_name = $row['name'];
  $customer_phone = $row['phone'];
  $customer_address = $row['address'];
} else {
  echo "0 results";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=
  , initial-scale=1.0">
  <title>Checkout</title>
</head>
<body>
    <h1>Info Customer</h1>
  <form action='processOrders.php' method='post'>
    <label for="">Customer Name</label>
    <br>
    <input name='customer_name' type="text" placeholder='Customer Name' value='<?php echo $customer_name ?>'>
    <br>
    <br>
    <label for="">Customer Phone</label>
    <br>
    <input name='customer_phone' type="number" placeholder='Phone Number' value='<?php echo $customer_phone; ?>'>
    <br>
    <br>
    <label for="">Customer Address</label>
    <br>
    <input name='customer_address' type="text" placeholder='Customer Address' value='<?php echo $customer_address; ?>'>
    <button type='submit'>Confirm</button>
  </form>
</body>
</html>