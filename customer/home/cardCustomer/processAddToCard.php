<?php 
session_start();
if(isset($_GET['status'])){
    $cart_id = intval($_GET['id']);
    if($_GET['status'] == 'plus'){
        // plus
        
        // intval($string)
        // echo $cart_id; exit;
        $_SESSION['cart'][$cart_id]++;
        // echo $_SESSION['cart'][$cart_id]; exit;
        header('location:./showCart.php');
        exit;
    }
    else{
        // minus
        if($_SESSION['cart'][$cart_id] <= 1){
            unset($_SESSION['cart'][$cart_id]);
            header('location:./showCart.php');
            exit;
        }
        else{
            $_SESSION['cart'][$cart_id]--;
            header('location:./showCart.php');
            exit;
        }
    }
}











$id = $_POST['product_id_cart'];
if(!isset($_SESSION['cart'][$id])){
    $_SESSION['cart'][$id] = 1;
    header("location:../home.php");
    exit;
}
if(!empty($_SESSION['cart'][$id])){
    $_SESSION['cart'][$id]++;
    header("location:../home.php"); 
    exit;   
}
// print_r($_SESSION['cart']);
?>