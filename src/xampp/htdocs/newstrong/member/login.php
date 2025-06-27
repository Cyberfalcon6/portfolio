
<?php

session_start();

?>

<html>
    <head>
        <title>
            Members Login Panel
        </title>
        <link rel="stylesheet" href="../static/css/style.css">
        <style>
            span{
                display: inline;
            }
        </style>
    </head>
    <body>
        <div class="login-box">
            <div class="login-header">
                <span><img src="../stafs/logo.png" alt="Newstrong Technical Company ltd Logo" class='logo'></span>
                <span><h2>Users Login Panel</h2></span>
            </div>

            <div>
            <form action="controls.php" method="POST">
                <div class="input-box">
                    <input type="email" name="email" placeholder="Email...........">
                </div>
                <div class="input-box">
                    <input type="password" name="password" id="pasword" placeholder="Password..........">
                </div>
                <?php 
                    if(isset($_SESSION['message'])){
                        echo "<p style='color: red'>" . $_SESSION['message'] . "</p>";
                    }
                ?>
                <button type="submit" name="login">Login</button>
            </form>
            </div>
        </div>
    </body>
</html>