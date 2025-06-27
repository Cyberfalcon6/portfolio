<?php
include '../db.php';
include '../auth.php'; 

// Check if user is logged in and has proper role

if (!isset($_GET['id'])) {
    header("Location: workerview.php");
    exit();
}

$doc_id = mysqli_real_escape_string($conn, $_GET['id']);
$query = "SELECT * FROM documents WHERE id = '$doc_id'";
$result = mysqli_query($conn, $query);
$document = mysqli_fetch_assoc($result);

if (!$document) {
    header("Location: workerview.php");
    exit();
}

// Handle form submission
if (isset($_POST['edit_document'])) {
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $phone = mysqli_real_escape_string($conn, $_POST['document_phone']);
    $other = mysqli_real_escape_string($conn, $_POST['other']);
    
    $update_query = "UPDATE documents SET 
        document_status = '$status',
        document_phone = '$phone',
        other = '$other'
        WHERE id = '$doc_id'";
    
    if (mysqli_query($conn, $update_query)) {
        if ($_SESSION['role'] === 'Admin') {
            header("Location: documents.php?success=1");
        } else {
            header("Location: ../dashboard.php?success=1");
        }
        exit();
    } else {
        // Handle error case
        if ($_SESSION['role'] === 'Admin') {
            header("Location: documents.php?error=1");
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
        <h1>Edit Document</h1>
        <?php 
            if ($_SESSION['role'] === 'Admin') {
                ?>
                <a href="documents.php" class="btn logout">Back</a>
                <?php
                } else {
                    ?>
            <a href="../dashboard.php" class="btn logout">Back</a>
            <?PHP
            }
        ?>
    </div>

    <div class="container">
        <div class="card">
            <form method="POST">
                <div class="form-group">
                    <label>Client Name:</label>
                    <input type="text" value="<?php echo $document['document_names']; ?>" readonly>
                </div>
                
                <div class="form-group">
                    <label>Status:</label>
                    <select name="status" required>
                        <option value="derivered" <?php echo $document['document_status'] === 'derivered' ? 'selected' : ''; ?>>Delivered</option>
                        <option value="payed" <?php echo $document['document_status'] === 'payed' ? 'selected' : ''; ?>>Paid</option>
                        <option value="partial_payed" <?php echo $document['document_status'] === 'partial_payed' ? 'selected' : ''; ?>>Partially Paid</option>
                        <option value="pending" <?php echo $document['document_status'] === 'pending' ? 'selected' : ''; ?>>Pending</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Phone:</label>
                    <input type="text" name="document_phone" value="<?php echo $document['document_phone']; ?>">
                </div>

                <div class="form-group">
                    <label>Comments:</label>
                    <textarea name="other"><?php echo $document['other']; ?></textarea>
                </div>

                <div class="form-group">
                    <button type="submit" name="edit_document" class="btn">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>