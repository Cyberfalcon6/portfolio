<?php
include '../db.php';
include '../auth.php'; 
// Check if user is logged in and has proper role
if (!isset($_GET['id'])) {
    header("Location: workerview.php");
    exit();
}

$user_id = mysqli_real_escape_string($conn, $_GET['id']);
$query = "SELECT * FROM users WHERE id = '$user_id'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

// Handle form submission
if (isset($_POST['edit_user'])) {
    $names = mysqli_real_escape_string($conn, $_POST['user_name']);
    $email = mysqli_real_escape_string($conn, $_POST['user_email']);
    $password = mysqli_real_escape_string($conn, $_POST['user_password']);
    $pass = password_hash($password, PASSWORD_BCRYPT);
    $role = mysqli_real_escape_string($conn, $_POST['role']);
    
    $update_query = "UPDATE users SET 
        names = '$names',
        email = '$email',
        password = '$pass',
        role = '$role'
        WHERE id = '$user_id'";
    
    if (mysqli_query($conn, $update_query)) {
        if ($_SESSION['role'] === 'Admin') {
            header("Location: manageuser.php");
        } else {
            header("Location: ../dashboard.php?success=1");
        }
        exit();
    } else {
        // Handle error case
        if ($_SESSION['role'] === 'Admin') {
            // header("Location: documents.php?error=1");
            echo "Error: ". mysqli_error($conn);
        } else {
            header("Location: workerview.php?error=1");
        }
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Document</title>
    <style>
        :root {
            --light-bg: #f1f8fd;
            --accent: #f6c667;
            --primary: #c70039;
            --primary-dark: #900c27;
            --text-color: #333;
            --text-inverse: #fff;
            --card-bg: #fff;
            --body-bg: var(--light-bg);
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--body-bg);
            color: var(--text-color);
        }

        .header {
            background-color: var(--primary-dark);
            color: var(--text-inverse);
            padding: 1rem;
            text-align: center;
            position: relative;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem;
        }

        .card {
            background-color: var(--card-bg);
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }

        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="password"],
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }

        .form-group textarea {
            height: 100px;
            resize: vertical;
        }

        .btn {
            background-color: var(--primary);
            color: var(--text-inverse);
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            font-size: 1rem;
        }

        .btn:hover {
            background-color: var(--primary-dark);
        }

        .logout {
            position: absolute;
            top: 1rem;
            right: 1rem;
        }

        input[readonly] {
            background-color: #f5f5f5;
            cursor: not-allowed;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Edit User</h1>
        <a href="manageuser.php" class="btn logout">Back</a>
    </div>

    <div class="container">
        <div class="card">
            <form method="POST">
                <div class="form-group">
                    <label>Name:</label>
                    <input type="text" value="<?php echo $user['names']; ?>" name="user_name">
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" name="user_email" value="<?php echo $user['email']; ?>">
                </div>
                
                <div class="form-group">
                    <label>Password:</label>
                    <input type="password" name="user_password" value="<?php echo $user['password']; ?>">
                    
                </div>
                <div class="form-group">
                    <label>Role:</label>
                    <select name="role" required>
                        <option value="Worker" <?php echo $user['role'] === 'Worker' ? 'selected' : ''; ?>>Worker</option>
                        <option value="Admin" <?php echo $user['role'] === 'Admin' ? 'selected' : ''; ?>>Admin</option>
                      </select>
                </div>
                <div class="form-group">
                    <button type="submit" name="edit_user" class="btn">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>