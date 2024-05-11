<?php
session_start();
if(!isset($_SESSION["admin"])){
    header("location:../login_logout/login.php");
}

?>
<!doctype html>
<html lang="en">
    <head>
        <title>Create user admin</title>

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
            <h1 class="text-center">Create Account</h1>
            <a href="../../customer/home/home.php">Home</a>
            <br>
            <a href="../../admin/product/index.php">Insert ProDuct</a>
            <br>
            <a href="./showInfo.php">Show All Info Admin</a>
        </header>
        <main>
            <div class="container text-center">
            <form action="processCreateUserAdmin.php" method="post">
                <label for="">Email</label>
                <br>
                <input type="email" required name="email">
                <br>
                <label for="">Username</label>
                <br>
                <input type="text" required name="username">
                <br>
                <label for="">Password</label>
                <br>
                <input type="password" required name="password">
                <br>
                <br>
                <button type="submit">Create</button>
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