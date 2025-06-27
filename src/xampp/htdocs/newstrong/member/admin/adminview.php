<?php

include 'auth.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin View - NEWSTRONG TECHNICAL COMPANY</title>
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
            display: flex;
            align-items: center;
        }

        .navbar-logo {
            height: 40px; /* Adjust as needed */
            width: auto;
            vertical-align: middle;
            margin-right: 10px;
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
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
        }

        .card h3 {
            color: var(--primary-dark);
            margin-bottom: 1rem;
        }

        .card-item {
            background-color: var(--light-bg);
            padding: 1rem;
            border-radius: 4px;
            text-align: center;
        }

        .footer {
            background-color: var(--primary-dark);
            color: var(--primary-dark);
            margin-bottom: 1rem;
        }

        .footer {
            background-color: var(--primary-dark);
            color: var(--text-inverse);
            text-align: center;
            padding: 1rem;
            position: fixed;
            bottom: 0;
            width: 100%;
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
            }

            .navbar-logo {
                height: 30px; /* Smaller logo for mobile */
            }
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar">
        <a href="#" class="navbar-brand">
            <img src="../stafs/logo.png" alt="Company Logo" class="navbar-logo">
            Admin Panel
        </a>
        <div class="hamburger" onclick="toggleMenu()">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="nav-links">
            <a href="dashboard.php">Dashboard</a>
            <a href="admin/documents.php">Documents</a>
            <a href="admin/manageuser.php">Users</a>
            <a href="logout.php">Logout</a>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="content">
        <div class="card">
            <h3>Welcome, <?php echo $row['names']; ?></h3>
            <p>This is your dashboard where you can manage all administrative tasks.</p>
        </div>

        <div class="card">
            <div class="card-item">
                <h3>Total Documents</h3>
                <?php 
                    $get_doc = mysqli_query($conn, "SELECT COUNT(*) as total FROM documents");
                    $doc_count = mysqli_fetch_assoc($get_doc);
                    echo '<p>' . $doc_count['total'] . '</p>';
                    echo "<a href='admin/documents.php'> View documents</a>";
                    ?>
            </div>
            <div class="card-item">
                <h3>Total Users</h3>
                <?php 
                    $get_users = mysqli_query($conn, "SELECT COUNT(*) as total FROM users");
                    $user_count = mysqli_fetch_assoc($get_users);
                    echo '<p>' . $user_count['total'] . '</p>';
                    echo "<a href='admin/manageuser.php'>Manage Users</a>";
                    ?>
            </div>
            <div class="card-item">
                <h3>Delivered documents</h3>
                <?php 
                $select_dervered = mysqli_query($conn, "select count(*) as total from documents where document_status='derivered'");
                $count = mysqli_fetch_assoc($select_dervered);
                echo "<p>" . $count['total'] . "</p>";
                ?>
            </div>
            <div class="card-item">
                <h3>Pending documents</h3>
                <?php 
                $select_dervered = mysqli_query($conn, "select count(*) as total from documents where document_status='pending'");
                $count = mysqli_fetch_assoc($select_dervered);
                echo "<p>" . $count['total'] . "</p>";
                ?>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2025 NEWSTRONG TECHNICAL COMPANY. All rights reserved.</p>
    </div>
</body>
</html>