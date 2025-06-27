<?php
include 'db.php';
include 'auth.php'; 

if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];

} else {
    echo "Not set";
}

?>

<html>
    <head>
        <style>
            <style>
        body { margin: 0;
        padding: 0;
        font-family: Arial, Helvetica, sans-serif;
        background-color: #f0f0f0; }
        .sidebar { width: 250px; height: 100vh; background: #343a40; color: white; padding: 20px; }
        .sidebar a { color: white; display: block; padding: 10px; text-decoration: none; }
        .sidebar a:hover { background: #495057; }
        .content { flex-grow: 1; padding: 20px; }
    </style>
        </style>
    </head>
    <body>

    <?php
    
    $select = mysqli_query($conn, "select * from users where id='$id'");
    $row = mysqli_fetch_assoc($select);
    if ($row['role'] == 'Admin') {
        include 'admin/adminview.php';
        ?>
        <?php } else {
            include 'admin/workerview.php';
        ?>

        <?php } ?>
    </body>
</html>