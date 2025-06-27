<?php 
include '../db.php';

include '../auth.php'; 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Documents - Admin</title>
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

        .navbar {
            background-color: var(--primary-dark);
            color: var(--text-inverse);
            padding: 1rem;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--text-inverse);
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .nav-links a {
            color: var(--text-inverse);
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .nav-links a:hover {
            background-color: var(--accent);
            color: var(--primary-dark);
        }

        .content {
            margin-top: 80px;
            padding: 2rem;
        }

        .card {
            background-color: var(--card-bg);
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .card h3 {
            color: var(--primary-dark);
            margin-bottom: 1rem;
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
        .form-group input[type="tel"],
        .form-group input[type="date"],
        .form-group input[type="file"],
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1rem;
        }

        .form-group textarea {
            min-height: 100px;
            resize: vertical;
        }

        .form-group input[type="submit"] {
            background-color: var(--primary);
            color: var(--text-inverse);
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .form-group input[type="submit"]:hover {
            background-color: var(--primary-dark);
        }

        .footer {
            background-color: var(--primary-dark);
            color: var(--text-inverse);
            text-align: center;
            padding: 1rem;
            margin-top: 2rem;
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

        .btn-download {
            background-color: #28a745;
            color: white;
            padding: 0.3rem 0.8rem;
            border-radius: 4px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .btn-download:hover {
            background-color: #218838;
        }

        .search-form {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
            padding: 1rem;
            background-color: var(--light-bg);
            border-radius: 8px;
        }

        .search-form .form-group {
            margin-bottom: 0;
        }

        .btn-clear {
            background-color: #dc3545;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }

        .btn-clear:hover {
            background-color: #c82333;
        }

        /* Mobile responsive styles */
        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                padding: 0.5rem;
            }

            .nav-links {
                flex-direction: column;
                width: 100%;
                text-align: center;
                padding: 0.5rem 0;
            }

            .nav-links a {
                display: block;
                padding: 0.5rem;
            }

            .content {
                margin-top: 200px;
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
<?php include 'includes/navbar.php'; ?>
    <!-- Main Content -->
    <div class="content">
        <div class="card">
            <h3>Record Document into Database</h3>
            <form action="../controls.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="names">Amazina:</label>
                    <input type="text" id="names" name="document_names" required placeholder="Names of document owner...">
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" id="address" name="document_address" required placeholder="Document address...">
                </div>
                <div class="form-group">
                    <label for="activity">Activity:</label>
                    <input type="text" id="document_activity" name="document_activity" required placeholder="Document activity...">
                </div>
                <div class="form-group">
                    <label for="date">Received Date:</label>
                    <input type="date" id="date" name="date" required>
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
                    <label for="document">Document:</label>
                    <input type="file" id="file" name="document" required>
                </div>
                <div class="form-group">
                    <label for="date2">Delivery Date:</label>
                    <input type="date" id="date2" name="date2" >
                </div>
                <div class="form-group">
                    <label for="other">Comments:</label>
                    <textarea name="other" id="other"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" name="add_document" value="Save Document">
                </div>
            </form>
            <div id="manage_document">
                <div class="search_bar">
                    <form method="GET" action="" class="search-form">
                        <div class="form-group">
                            <label for="names">Names:</label>
                            <input type="text" name="search_name" placeholder="Search by name..." value="<?php echo isset($_GET['search_name']) ? htmlspecialchars($_GET['search_name']) : ''; ?>">
                        </div>
                        &nbsp;
                        <div class="form-group">
                            <label>From:</label>
                            <input type="date" name="start_date" value="<?php echo isset($_GET['start_date']) ? htmlspecialchars($_GET['start_date']) : ''; ?>">
                        </div>
                        &nbsp;
                        <div class="form-group">
                            <label>To:</label>
                            <input type="date" name="end_date" value="<?php echo isset($_GET['end_date']) ? htmlspecialchars($_GET['end_date']) : ''; ?>">
                        </div>
                        <!-- &nbsp; -->
                        <div class="form-group">
                            <input type="submit" value="Search">
                            <a href="?" class="btn btn-clear">Clear</a>
                        </div>
                    </form>
                </div>
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
                        <th>Document</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Build the base query
                    $docs_query = "SELECT * FROM documents WHERE 1=1";

                    // Add search conditions
                    if (isset($_GET['search_name']) && !empty($_GET['search_name'])) {
                        $search_name = mysqli_real_escape_string($conn, $_GET['search_name']);
                        $docs_query .= " AND document_names LIKE '%$search_name%'";
                    }

                    if (isset($_GET['start_date']) && !empty($_GET['start_date'])) {
                        $start_date = mysqli_real_escape_string($conn, $_GET['start_date']);
                        $docs_query .= " AND document_date >= '$start_date'";
                    }

                    if (isset($_GET['end_date']) && !empty($_GET['end_date'])) {
                        $end_date = mysqli_real_escape_string($conn, $_GET['end_date']);
                        $docs_query .= " AND document_date <= '$end_date'";
                    }

                    // Add sorting
                    $docs_query .= " ORDER BY document_date DESC";

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
                                    <?php if (!empty($doc['document'])): ?>
                                        <a href="../uploads/documents/<?php echo $doc['document']; ?>" download class="btn btn-download">Download</a>
                                    <?php else: ?>
                                        No file
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="edit_document.php?id=<?php echo $doc['id']; ?>" class="btn btn-edit">Edit</a>
                                    <a href="delete_document.php?id=<?php echo $doc['id']; ?>" class="btn btn-edit">Delete</a>
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
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2025 NEWSTRONG TECHNICAL COMPANY. All rights reserved.</p>
    </div>
</body>
</html>
