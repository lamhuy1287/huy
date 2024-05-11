<?php

// echo "file log in";
session_start();
if(isset($_SESSION["admin"])){
    header("location:../../admin/product/index.php");
}
?>
<!doctype html>
<html lang="en">
    <head>
        <title>Login admin</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header>
            <!-- place navbar here -->
            <h1 class="text-center">Đăng nhập</h1>
            <a href="../../customer/home/home.php">Home</a>
        </header>
        <main>
            <div class="container text-center">
                <form action="./processCheckAccount.php" method="post">
                    <label for="">Email</label>
                    <br>
                    <input type="email" required name="email">
                    <br>
                    <label for="">Password</label>
                    <br>
                    <input type="password" required name="password">
                    <br>
                    <br>
                    <p><?php if(isset($_SESSION["Check"])){ echo "Incorrect Email or Password"; unset($_SESSION["Check"]);} ?></p>

                
                    <button type="submit" >Đăng nhập</button>
                </form>
            </div>
        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
