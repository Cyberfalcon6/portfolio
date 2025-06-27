<?php 
// include 'auth.php';
include '../db.php';

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
} else{
    // header("Location: ../../index.php");
    echo "not set";
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Worker Dashboard</title>
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
        }

        .container {
            max-width: 1200px;
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

        .task-list {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        .task-list th, .task-list td {
            padding: 0.75rem;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .task-list th {
            background-color: var(--primary-dark);
            color: var(--text-inverse);
        }

        .task-list tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .btn {
            background-color: var(--primary);
            color: var(--text-inverse);
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .btn:hover {
            background-color: var(--primary-dark);
        }

        .logout {
            position: absolute;
            top: 1rem;
            right: 1rem;
        }

        .status-badge {
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 0.9em;
        }
        .status-badge.derivered { background-color: #28a745; color: white; }
        .status-badge.payed { background-color: #17a2b8; color: white; }
        .status-badge.partial_payed { background-color: #ffc107; color: black; }
        .status-badge.pending { background-color: #dc3545; color: white; }
        
        .btn-edit { background-color: #ffc107; color: black; margin-right: 5px; }
        .btn-view { background-color: #17a2b8; }
        
        .task-list td { vertical-align: middle; }

        .form-group {
            margin-bottom: 1rem;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }
        
        .form-group input[type="text"],
        .form-group input[type="tel"],
        .form-group input[type="date"],
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }
        
        .form-group textarea {
            resize: vertical;
            min-height: 100px;
        }
        
        .form-group input[type="file"] {
            border: 1px solid #ddd;
            padding: 0.5rem;
            width: 100%;
        }
        
        .form-group input[type="submit"] {
            margin-top: 1rem;
        }
        
        /* Success message styling */
        .alert {
            padding: 1rem;
            margin-bottom: 1rem;
            border-radius: 4px;
        }
        
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Worker Dashboard</h1>
        <a href="logout.php" class="btn logout">Logout</a>
    </div>

    <div class="container">
        <!-- Add Document Form Card -->
        <div class="card">
            <h2>Add New Document</h2>
            <?php 
            $path  = "/newstrong/member/controls.php";
            ?>
            <form action="<?php echo $path; ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="names">Client Name:</label>
                    <input type="text" id="names" name="document_names" required placeholder="Names of document owner...">
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" id="address" name="document_address" required placeholder="Document address...">
                </div>
                <div class="form-group">
                    <label for="activity">Activity:</label>
                    <input type="text" id="activity" name="document_activity" required placeholder="Document activity...">
                </div>
                <div class="form-group">
                    <label for="date">Received Date:</label>
                    <input type="date" id="date" name="date">
                </div>
                <div class="form-group">
                    <label for="status">Document Status:</label>
                    <select name="status" id="status" required>
                        <option value="derivered">Delivered</option>
                        <option value="payed">Paid</option>
                        <option value="partial_payed">Partially Paid</option>
                        <option value="pending">Pending</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="tel" id="phone" name="document_phone" required>
                </div>
                <div class="form-group">
                    <label for="document">Document File:</label>
                    <input type="file" id="document" name="document" required>
                </div>
                <div class="form-group">
                    <label for="date2">Delivery Date:</label>
                    <input type="date" id="date2" name="date2" required>
                </div>
                <div class="form-group">
                    <label for="other">Comments:</label>
                    <textarea name="other" id="other" rows="4"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" name="add_document" value="Save Document" class="btn">
                </div>
            </form>
        </div>

        <!-- Document List Card -->
        <div class="card">
            <?php 
            $get_names = mysqli_query($conn, "select * from users where id='$id'");
            $row = mysqli_fetch_assoc($get_names);
            ?>
            <p>Welcome <b><?php echo $row['names']; ?></b></p>
            <h2>Document Management</h2>
            
            <table class="task-list">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Client Name</th>
                        <th>Address</th>
                        <th>Activity</th>
                        <th>Status</th>
                        <th>Phone</th>
                        <th>Received Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $docs_query = "SELECT * FROM documents ORDER BY document_date DESC";
                    $result = mysqli_query($conn, $docs_query);

                    if (mysqli_num_rows($result) > 0) {
                        while ($doc = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td><?php echo $doc['id']; ?></td>
                                <td><?php echo $doc['document_names']; ?></td>
                                <td><?php echo $doc['document_address']; ?></td>
                                <td><?php echo $doc['document_activity']; ?></td>
                                <td>
                                    <span class="status-badge <?php echo $doc['document_status']; ?>">
                                        <?php echo ucfirst($doc['document_status']); ?>
                                    </span>
                                </td>
                                <td><?php echo $doc['document_phone']; ?></td>
                                <td><?php echo date('Y-m-d', strtotime($doc['document_date'])); ?></td>
                                <td>
                                    <a href="admin/edit_document.php?id=<?php echo $doc['id']; ?>" class="btn btn-edit">Edit</a>
                                    <a href="view_document.php?id=<?php echo $doc['id']; ?>" class="btn btn-view">View</a>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        echo "<tr><td colspan='8'>No documents found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php
    // Display success/error messages
    if (isset($_GET['success'])) {
        echo '<div class="alert alert-success">Document saved successfully!</div>';
    }
    if (isset($_GET['error'])) {
        echo '<div class="alert alert-error">Error saving document. Please try again.</div>';
    }
    ?>
</body>
</html>